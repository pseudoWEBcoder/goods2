<?php

namespace app\models;

use yii\base\Model;
use yii\helpers\ArrayHelper;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class UploadForm extends Model
{
    const dir = 'C:\Users\alal\Downloads';
    public $file;
    public $files = [];
    public $json = [];


    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['file'], 'safe']
        ];
    }

    public function getFilesMap()
    {
        return ArrayHelper::map($this->files, 'md5', function ($i) {
            return $i;
        });
    }

    public function upload()
    {

        if (!isset($this->filesMap[$this->file]))
            throw  new \Exception('invalid  md5' . $this->file);

        try {
            $file = $this->filesMap[$this->file];
            $json = file_get_contents($file['path']);
            $this->json = json_decode($json, true);
            $ok = $this->execute();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function execute()
    {
        $count = 0;
        foreach ($this->json as $index => $item) {
            $_id = ArrayHelper::getValue($item, '_id');
            $createdAt = ArrayHelper::getValue($item, 'createdAt');
            $ticket = ArrayHelper::getValue($item, 'ticket');
            foreach ($ticket as $itiket => $ticket_item) {
                $document = ArrayHelper::getValue($ticket_item, 'document');
                $receipt = ArrayHelper::getValue($ticket_item, 'receipt');
                /*тут сложна, надо бы сделать генерацию ошибки если   несколько  receipt в ticket*/
                foreach ($receipt as $ireceipt => $receipt_item) {
                    $count++;
                    $items = ArrayHelper::getValue($receipt, 'items');
                    $kktRegId = ArrayHelper::getValue($receipt, 'kktRegId');
                    $fiscalDocumentNumber = ArrayHelper::getValue($receipt, 'fiscalDocumentNumber');
                    $fiscalDriveNumber = ArrayHelper::getValue($receipt, 'fiscalDriveNumber');
                    // $fiscalDriveNumber = ArrayHelper::getValue($receipt, 'fiscalDriveNumber');
                    $totalSum = ArrayHelper::getValue($receipt, 'totalSum');
                    $exist = Receipt::find()->where([
                        'kkt_reg_id' => $kktRegId,
                        'fiscal_document_number' => $fiscalDocumentNumber,
                        'fiscal_drive_number' => $fiscalDriveNumber,
                        'total_sum' => $totalSum,
                    ])->exists();
                    if (!$exist)
                        $new[] = $receipt;
                }
            }
        }

        foreach ($new as $receipt) {
            $fields = [];
            $fields = Receipt::camelToId($receipt);
            $Receipt = new Receipt($fields);
            $ok1 = $Receipt->save();
            foreach ($receipt['items'] as $i => $v) {
                $fields_items = Items::camelToId($receipt);
                $Item = new Items($fields_items);
                $Item->receipt_id = $Receipt->id;
                $ok2 = $Item->save();

            }

        }
        if (empty($new)) {
            $status_num = Upload::STATUS_EMPTY;
        } else {
            $status_num = Upload::STATUS_OK;
        }
        if (!empty($err)) {
            $status_num = Upload::STATUS_ERROR;
        }
        $status = \Yii::t('app', 'проверено = {all} новых = {new}', ['all' => $count, 'new' => count($new ?? [])]);
        $report = new  Upload(['md5' => $this->file,
            'status' => $status,
            'status_num' => $status_num,
            'info' => $this->filesMap[$this->file],]);
        $report->save(false);

    }

    public function scandir()
    {
        if (!realpath(self::dir))
            throw  new \Exception('invalid  dir' . self::dir);
        $files = \yii\helpers\FileHelper::findFiles(self::dir, ['only' => ['*.json']]);
        usort($files, function ($a, $b) {
            $A = filectime($a);
            $B = filectime($b);
            return ($A > $B) ? -1 : 1;
        });
        foreach ($files as $f)
            $Files [] = [
                'path' => $f,
                'name' => basename($f, '.json'),
                'fileatime' => fileatime($f),
                'fileatimeHuman' => date("F d Y H:i:s", fileatime($f)),
                'filectime' => filectime($f),
                'filectimeHuman' => date("F d Y H:i:s", filectime($f)),
                'filesize' => filesize($f),
                'filesizeHuman' => self::human_filesize(filesize($f)),
                //   'finfo'=>finfo_file($f),
                'md5' => $md5 = md5_file($f),
                'exists' => $md5 = Upload::find()->where(['md5' => $md5])->one(),
            ];
        $this->files = $Files;
    }

    public static function human_filesize($bytes, $dec = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];
        for ($i = 0; $bytes > 1024; $i++) $bytes /= 1024;
        return round($bytes, 2) . ' ' . $units[$i];
    }

}
