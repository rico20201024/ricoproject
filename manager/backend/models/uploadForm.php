<?

namespace backend\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageurl;
	public $url;

    public function rules()
    {
        return [
            [['imageurl'], 'file', 'extensions' => 'png, jpg'],
				// ['imgeurl','safe'],

				    // ['imgeurl', 'file', 'when' => function($model) {
						// return $model->imgeurl!='';
					// }]
		];

    }
		public function actions() {

		}
    
	//上存图片
    public function upload()
    {
		//判断文件是否存在如果不在就生成一个文件夹
        if ($this->validate()) {
				
				$this->url='../dist/uploads/' . md5(time().$this->imageurl->baseName) . '.' . $this->imageurl->extension;
				$this->imageurl->saveAs($this->url);
            return true;
        } else {
            return false;
        }
    }
	
	
	    // * 富文本框的图片上传
     /* @return array
     */
    public function actionUploadImage()
    {
        $model = new Upload();
        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, "file");
            $dir = '/uploads/ueditor/';//文件保存目录
            if (!is_dir($dir))
                mkdir($dir);
            if ($model->validate()) {
                $fileName = $model->file->baseName . "." . $model->file->extension;
                $dir = $dir."/". $fileName;
                $model->file->saveAs($dir);
                $info = [
                    "originalName" => $model->file->baseName,
                    "name" => $model->file->baseName,
                    "url" => $dir,
                    "size" => $model->file->size,
                    "type" => $model->file->type,
                    "state" => "SUCCESS",
                ];
                exit(json_encode($info));
            }
        }
    }
}
?>