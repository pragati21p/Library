$(document).ready(function(){
	$(".head-space").on("click", function(){
		$(".search-div").fadeIn(200);
		$(".wrapper").addClass("wrapper-open");
	});
	$(".sort").hover(function(){
		$(this).children(".head-right-dropdown").fadeIn(200);
	}, function(){
		$(this).children(".head-right-dropdown").fadeOut(200);
	});	
	$(".hamburger").on('click',function(){
		$("body").css("overflow","hidden");
		$(".wrapper").addClass("wrapper-open");
		$( ".left-sidebar" ).addClass("main-side");
	});
	$(".new-badge").hover(function(){
		$(this).children(".add-title").fadeIn(200);
		},function(){
			$(this).children(".add-title").fadeOut(200);
	});
	$(".wrapper").click(function(){
		$("body").css("overflow","scroll");
		$( ".left-sidebar" ).removeClass("main-side");
		$(".wrapper").removeClass("wrapper-open");
		$(".search-div").fadeOut(200);
		$(".popup-image").css('display','none');
	});
	$(".card").hover(function(){
		$(this).find(".card-badge").fadeIn(200);
		},function(){
			$(this).find(".card-badge").fadeOut(200);
	});
	$(".card-badge").hover(function(){
		$(this).children(".add-title").fadeIn(200);
		},function(){
			$(this).children(".add-title").fadeOut(200);
	});
	$("#set-project-image").click(function(){
		$(".popup-wrapper").addClass("popup-wrapper-open");
		$(".popup").css("display", "block");
		$("#choose").removeClass('featuredimage').addClass('projectgallery');
	});
	$("#status").click(function(){
		if($(this).html()=='active'){
			$(this).removeClass('green-fill').html('inactive');
			$('input#project-status').attr('value','0');
		}else{
			$(this).addClass('green-fill').html('active');
			$('input#project-status').attr('value','1');
		}
	});
	$(document).on('click',".right-cross", function(){
		$(".popup-wrapper").removeClass("popup-wrapper-open");
		$(this).parent()
			.css('display', "none")
				.find("#upload").addClass('active')
					.end()
					.find("#choose").removeClass('active')
						.end()
						.find("#upload-tab").addClass('active')
							.end()
							.find("#choose-tab").removeClass('active');
	});
	$("#set_featured").click(function(){
		$(".popup-wrapper").addClass("popup-wrapper-open");
		$(".popup").css("display", "block");
		$("#choose").removeClass('projectgallery').addClass('featuredimage');
	});
	$("#addmedia").click(function(){
		$(".popup-wrapper").addClass("popup-wrapper-open");
		$(".popup").css("display", "block");
	});
	$(document).on('click', 'span.utility-bar', function(){
		var id='',title='',desc='';
		id = $(this).siblings("input.input-id").val();
		title = $(this).siblings("input.input-title").val();
		desc = $(this).siblings("input.input-desc").val();
			
		$(".popup-wrapper").addClass("popup-wrapper-open");
		$(".popup-desc").css("display", "block").html('<p id="img-id" data-id="' + id + '"><div class="right-cross"><i class="fa fa-times"></i></div><p class="card-title">title</p><input type="text" id="title" class="card-head-detail" value="' + title + '"><p class="card-title">description</p><textarea id="desc" class="card-head-detail">'+ desc +'</textarea><p class="badge new-badge set-image" id="set-gallery-file">set</p>');
		console.log(id);
	});
	$(document).on('click', '#set-gallery-file',function(){
		var title = $(this).siblings('input').val();
		var desc = $(this).siblings('textarea').val();
		var id = $(this).siblings('#img-id').attr('data-id');
		$(".gallery-area").find("input.input-id").each(function(){
			if($(this).attr('value')==id){
				$(this).siblings('input.input-title').attr('value', title);
				$(this).siblings('input.input-desc').attr('value', desc);
			}
		});
		console.log(title);
		$(".popup-wrapper").removeClass("popup-wrapper-open");
		$(".popup-desc").css("display", "none");
	});
	$(document).on('click', '.reset-media-size', function(){
		$(this).parent().parent('.row').remove();
	});
	
});