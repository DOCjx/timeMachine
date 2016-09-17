$(".xueshu").click(function(){
  $(".conter1").show();
  $(".conter2").hide();
  $(".conter3").hide();
});

$(".jiaoyou").click(function(){
  $(".conter2").show();
  $(".conter1").hide();
  $(".conter3").hide();

});

$(".yanlun").click(function(){
  $(".conter3").show();
  $(".conter2").hide();
  $(".conter1").hide();
});

$(".fu").click(function(){
  $(".fu1").toggle();
});

//取数
function getByClass(oParent, sClass) {
	if (oParent.getElementsByClassName) {
	return oParent.getElementsByClassName(sClass);
	} else { //IE 8 7 6
		var arr = [];
		var reg = new RegExp('\\b' + sClass + '\\b');
		var aEle = oParent.getElementsByTagName('*');
		for (var i = 0; i < aEle.length; i++) {
		if (reg.test(aEle[i].className)) {
		arr.push(aEle[i]);
		}
		}
		return arr;
	}
}
function testAuto() {
	var textName = getByClass(document, 'neirong');
	for (var i = 0; i < textName.length; i++) {
		var nowLeng = textName[i].innerHTML.length;
	if ( nowLeng > 100 ) {
		var nowWord = textName[i].innerHTML.substr(0, 100) + '······';
		textName[i].innerHTML = nowWord;
		}
	}
}
testAuto();

//模态框
$(function(){
      	$(".start").on("click",function(){
       	 $(".modal").addClass("in");
       	 $(".modal").css('z-index','1001');
       	 $(".modal-backup").css('display','block');
       });
      	$(".close").on("click",function(){
       	 $(".modal").removeClass('in');
       	 $(".modal").css('z-index','-1');
       	 $(".modal-backup").css('display','none');
       });
})
$(function(){
      	$(".start1").on("click",function(){
       	 $(".modal1").addClass("in");
       	 $(".modal1").css('z-index','1001');
       	 $(".modal-backup").css('display','block');
       });
      	$(".close").on("click",function(){
       	 $(".modal1").removeClass('in');
       	 $(".modal1").css('z-index','-1');
       	 $(".modal-backup").css('display','none');
       });
})