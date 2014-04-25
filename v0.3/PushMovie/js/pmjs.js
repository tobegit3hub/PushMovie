
$(document).ready(function(){  
	var db_w = 330;
	var db_h = 130;
	var db_w1 = 330;
	var db_h1 = 25;
	var db_w2 = 800; 
	var db_h2 = 600;
	var db_mark = 0;
	var db_mark1 = 0;
	var in_now_w = 90;
	var in_now_h = 100;
	var in_now_h1 = 25;
	var in_now_w1 = 90;
	var in_now_mark = 0;
	var push_left_w = 330;
	var push_left_h = 170;
	var push_left_w1 = 330;
	var push_left_h1 = 400;
	var push_left_mark = 0;
	var push_right_w = 330;
	var push_right_h = 170;
	var push_right_w1 = 330;
	var push_right_h1 = 400;
	var push_right_mark = 0;
	var logo_h = 70;
	var logo_w = 120;
	var logo_h1 = 200;
	var logo_w1 = 120;
	var logo_mark = 0;
	var left_id = 0;
	var right_id = 0;
	//toggle_db();
	function toggle_logo(){
		logo_mark = (logo_mark + 1) % 2;
		
		if (logo_mark == 1){
			$("#logo").animate({height:logo_h1+"px",width:logo_w1+"px"});
		}
		else{
			$("#logo").animate({height:logo_h+"px",width:logo_w+"px"});
		}
	}
	function toggle_db(){
		$("#db_a").html('<a id="db_a" href="#">Database enterance</a>');
		db_mark = (db_mark + 1) % 2;
		if (db_mark == 1){
			$("#db").animate({height:db_h1+"px",width:db_w1+"px"});
		}
		else{
			$("#db").animate({height:db_h+"px",width:db_w+"px"});
		}
	}
	function toggle_in_now(){
		in_now_mark = (in_now_mark + 1) % 2;
		if (in_now_mark == 1){
			$("#in_now").animate({height:in_now_h1+"px",width:in_now_w1+"px"});
		} 
		else{
			$("#in_now").animate({height:in_now_h+"px",width:in_now_w+"px"});
		}
	}
	function toggle_push_left(){
		push_left_mark = (push_left_mark + 1) % 2;
		if (push_left_mark == 1){
			$("#push_left").animate({height:push_left_h1+"px",width:push_left_w1+"px"});
		} 
		else{
			$("#push_left").animate({height:push_left_h+"px",width:push_left_w+"px"});
		}
	}
	function toggle_push_right(){
		push_right_mark = (push_right_mark + 1) % 2;
		if (push_right_mark == 1){
			$("#push_right").animate({height:push_right_h1+"px",width:push_right_w1+"px"});
		} 
		else{
			$("#push_right").animate({height:push_right_h+"px",width:push_right_w+"px"});
		}
	}
	function toggle_db_show(){
		db_mark1 = (db_mark1 + 1) % 2;
		if (db_mark1 == 1){
			$("#db").animate({height:db_h2+"px",width:db_w2+"px"});
		} 
		else{
			$("#db").animate({height:db_h+"px",width:db_w+"px"});
		}
	}
	function toggle_push_both(){
		toggle_push_left();
		toggle_push_right()
	}
	
	$("#in_now_a").click(function(){
		if (db_mark1 == 1){ $("#db_a").click();
		} else toggle_db();
		toggle_in_now();
		toggle_push_both();
		//toggle_logo();
		if (push_left_mark == 1 && push_right_mark == 1){
			$.ajax({
			  url: "choose.php",
			  dataType: "html",
			  timeout: 1000,
			  error: function(){
				  alert("can not login");
			  },
			  success: function(html){
				  $("#push_left").html(html);
				  $('#div_choose').fadeToggle();
				  left_id = parseInt($("#none_left").html() );
				  right_id = parseInt($("#none_right").html() );
			  }
			}); 
		}
		else{
			$('#div_choose').fadeToggle();
			
			$("#push_left").html('');
		}
	});
	$("#choose_left").click(function(){
		//alert(left_id);
		$.ajax({
			url:"execute_choose.php",
			data:'movie_id='+left_id,
			type: "POST",
			//data: 'img_src='+$(this).attr("src"),
			dataType:"html",
			timeout:1000,
			error:function(){alert('not noticed');},
			success: function(html){
				$("#push_left").html(html);
				$('#push_left').css({"display":"none"});
				$('#push_right').css({"display":"none"});
				$('#push_left').fadeToggle();
				$('#push_right').fadeToggle();
			}
		});
	});
	$("#choose_right").click(function(){
		//alert(right_id);
		$.ajax({
			url:"execute_choose.php",
			data:'movie_id='+right_id,
			type:"POST",
			dataType:"html",
			timeout:1000,
			error:function(){alert('not noticed');},
			success: function(html){
				$("#push_left").html(html);
				$('#push_left').css({"display":"none"});
				$('#push_right').css({"display":"none"});
				$('#push_left').fadeToggle();
				$('#push_right').fadeToggle();
			}
		});
	});
	
	$("#choose_none").click(function(){
		//alert(right_id);
		$.ajax({
			url:"choose.php",
			dataType:"html",
			timeout:1000,
			error:function(){alert('not noticed');},
			success: function(html){
				$("#push_left").html(html);
				$('#push_left').css({"display":"none"});
				$('#push_right').css({"display":"none"});
				$('#push_left').fadeToggle();
				$('#push_right').fadeToggle();
			}
		});
	});
	
	$("#push_me").click(function(){
		//alert(right_id);
		$("#push_result").slideToggle();
		$.ajax({
			url:"recommend.php",
			dataType:"html",
			timeout:1000,
			error:function(){alert('not noticed');},
			success: function(html){
				$("#push_result").html(html);
			}
		});
		
	});
	 
	$("#db_a").click(function(){
		toggle_in_now();
		toggle_db_show();
		if (db_mark1 == 1){
			$.ajax({
			  url: "show_database.php",
			  dataType: "html",
			  timeout: 1000,
			  error: function(){
				  alert("can not login11");
			  },
			  success: function(html){
				  
				  $("#db_content").html(html);
				
				  //alert(json.details[0].img);
			  }
			}); 
		}
		else{
			$("#db_content").html('');
		}
	});
});

