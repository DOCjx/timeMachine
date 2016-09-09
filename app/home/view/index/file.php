<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>UPLOAD</title>
</head>
<body>
	<form action="" method="post" enctype="multipart/form-data">
		<p>文件1<input type="file" name="upload[]"></p>
		<p>文件2<input type="file" name="upload[]"></p>
		<p><input type="submit" name="sub"></p>
	</form>
	<?php
	 	date_default_timezone_set('PRC');
	 	//根据上传结果，开始处理上传
		if( isset($_POST['sub'])&&!$_FILES['upload']['error']['1']&&!$_FILES['upload']['error']['0'] ){
			//分类存储文件
			var_dump($_FILES);
			foreach($_FILES['upload']['type'] as $cK=>$case){
				foreach ($_FILES['upload']['name'] as $fK=>$fileName) {
					if( $cK==$fK ){
						//查看文件类型对应文件夹是否存在，否则创建
						$filePlace = getcwd().'\\'.strtok($case,"/").'\\';
						if (!is_dir($filePlace)) mkdir($filePlace);
						$fileType = substr($_FILES['upload']['name'][$fK],strpos($_FILES['upload']['name'][$fK],".")+1);
						//生成文件名为当前时间，后缀与上传文件相同的新文件名
						$newName = date('YmdHi').'.'.$fileType;
						// var_dump($newName);
						move_uploaded_file($_FILES['upload']['tmp_name'][$fK],$filePlace.$newName);
						//生成查看文件链接
						$aNewPlace = substr($_SERVER['HTTP_REFERER'],0,-9).strtok($case,"/").'/'.$newName;
						// var_dump($aNewPlace);
						echo "<p>上传成功！查看或下载文件:<a href=\"$aNewPlace\">".$_FILES['upload']['name'][$fK]."</a></p>";
					}
				}
			}
		} elseif( !empty($_FILES) ) {
			// var_dump($_FILES);
			//若不是第一次进入页面并且文件上传失败，提示错误结果
			foreach ($_FILES['upload']['error'] as $key => $value) {
				if ( $value ) {
					$errorName = $key+1;
					echo '<p>文件'.$errorName.'上传出现问题，错误类型：<font color="red">'.$value.'</font></p>';
				}
			}
		}
	?>
</body>
</html>