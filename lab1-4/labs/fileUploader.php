<?php 

/**
 * 
 */
class FileUploader
{
	private static $size_limit = 50000;
	private $uploadOk = true;
	private $file_original_name;
	private $file_temp_name;
	private $file_type;
	private $file_size;
	private $final_file_name;

	function __construct($file_temp_name)
	{
		$this->file_temp_name = $file_temp_name;
	}

	public function setOriginalName($name)
	{
		$this->file_original_name = $name;
	}
	public function getOriginalName()
	{
		return $this->file_original_name;
	}
	public function setFileType($type)
	{
		$this->file_type = $type;
	}
	public function getFileType()
	{
		return $this->file_type;
	}
	public function setFileSize($size)
	{
		$this->file_size = $size;
	}
	public function getFileSize()
	{
		return $this->file_size;
	}
	public function setFinalFileName($final_name)
	{
		$this->final_file_name = $final_name;
	}
	public function getFinalFileName()
	{
		return $this->final_file_name;
	}





	public function uploadFile()
	{
		if ($this->uploadOk) {
			if (move_uploaded_file($this->file_temp_name, $this->final_file_name)) {
    			return true;
  			}
		}
		return false;
	}
	public function fileAlreadyExists()
	{
		if (file_exists($this->final_file_name)) {
  			$this->uploadOk = false;
		}
	}
	public function saveFilePathTo()
	{
		# code...
	}
	public function moveFile()
	{
		# code...
	}
	public function fileTypeIsCorrect()
	{
		$file_type = $this->file_type;

		// Check if image file is a actual image or fake image
		if($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg" && $file_type != "gif" )
			$this->uploadOk = false;
		//format
		$check = getimagesize($this->file_temp_name);
		
		if($check !== false) {
			return true;
  		} else {
  			$this->uploadOk = false;
  		}
	}
	public function fileSizeIsCorrect()
	{
		if ($this->file_size > $this::$size_limit) {
  			$this->uploadOk = false;
		}
		return true;
	}
	public function fileWasSelected()
	{
		if (!is_null($this->file_original_name)) {
			return true;
		}
  		$this->uploadOk = false;
	}
}



 ?>