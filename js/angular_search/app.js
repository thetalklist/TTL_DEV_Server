//=====ANGULAR JS
var app = angular.module('ttlAngularSearch', [
  'ngRoute',
  'ngSanitize'
]);


app.run(function($rootScope){
  $rootScope.$on("$includeContentLoaded", function(event, templateName){
     initialize_header_data();
  });
});



//=====SEARCH CONTROLLER
app.controller('ttlSearchCtrl', function ( $scope,$http,filterFilter) {
	$scope.BASE_URL 	= BASE_URL;//FRONT IMAGE URL
	$scope.search = {};
	$scope.filter_text = $("#keywords").val();
	//FIRSTLY GET ALL DATA
	var addedrates		= 'no';
	
	
	var param_string	=	'';
	param_string 		= window.location.search;
	/*
	if(param_string == '' ){
		var param_langInput1 	= $('#langInput1').val();
		var param_langInput2 	= $('#langInput2').val();
		var param_keywords 		= $('#keywords').val();
		var param_gender 		= $('#gender').val();
		var param_school 		= $('#school').val();
		var param_sch 			= $('#sch').val();
		var param_country 		= $('#country').val();
		var param_province 		= $('#province').val();
		var param_today 		= $('#today').val();
		var param_fromTime 		= $('#fromTime').val();
		var param_toTime 		= $('#toTime').val();
		var param_keyword 		= $('#keywords').val();
		
		var param_string			=	'?';
		param_string				+=	'langInput1='+param_langInput1;
		param_string				+=	'&langInput2='+param_langInput2;
		param_string				+=	'&keywords='+param_keywords;
		param_string				+=	'&gender='+param_gender;
		param_string				+=	'&school='+param_school;
		param_string				+=	'&sch='+param_sch;
		param_string				+=	'&country='+param_country;
		param_string				+=	'&province='+param_province;
		param_string				+=	'&today='+param_today;
		param_string				+=	'&fromTime='+param_fromTime;
		param_string				+=	'&toTime='+param_toTime;
		param_string				+=	'&keyword='+param_keyword;
	}
	*/
	var data_url = BASE_URL+'angular_search/get_all_data'+''+param_string;
	//var data_url = BASE_URL+'angular_search/get_all_data';


	
	$http({method: 'GET',url: data_url}).then(function(data) {
		$(".main_div").show();
		initialize_search_page_data();
		$scope.$watch('search', function (newVal, oldVal) {
			//========GET VALUES FROM PARAMETERS
			if(exist_param_langInput1!="")
			{
				$scope.filter_language = exist_param_langInput1;
			}
			else
			{
				$scope.filter_language  = 'English';
			}
			if(exist_param_langInput2!="")
			{
				$scope.filter_language2 = exist_param_langInput2;
			}
			else
			{
				$scope.filter_language2  = '0';
			}
			if(exist_param_keywords!="")
			{
				$scope.filter_text = exist_param_keywords;
			}
			else
			{
				$scope.filter_text = '';
			}
			if(exist_param_gender!="")
			{
				$scope.filter_gender = exist_param_gender;
			}
			else
			{
				$scope.filter_gender  = 'all';
			}
			if(exist_param_school!="")
			{
				$("#school").val(exist_param_school);
			}
			else
			{
				$("#school").val("");				
			}
			if(exist_param_sch!="")
			{
				$("#sch").val(exist_param_sch);
			}
			else
			{
				$("#sch").val("");
			}
			if(exist_param_country!="")
			{
				$scope.filter_countries = exist_param_country;
			}
			else
			{
				$scope.filter_countries="0";
			}
			if(exist_param_province!="")
			{
				$scope.filter_provinces = exist_param_province;
			}
			else
			{
				$scope.filter_provinces="0";
			}
			if(exist_param_today!="")
			{
				$("#today").val(exist_param_today);
			}
			else
			{
				$("#today").val("");
			}
			if(exist_param_fromTime!="")
			{
				$("#fromTime").val(exist_param_fromTime);
			}
			else
			{
				$("#fromTime").val("");
			}
			if(exist_param_toTime!="")
			{
				$("#toTime").val(exist_param_toTime);
			}
			else
			{
				$("#toTime").val("");
			}
			if(exist_param_sortKeys!="")
			{
				if(exist_param_sortKeys=="avgRate")
				{
					$scope.filter_sort_by_value = '-readytotalk';
					$scope.filter_sort_by_value2 = '-'+exist_param_sortKeys;
					$scope.filter_sort_by_value3 = '';
				}
				else if(exist_param_sortKeys=="hRate")
				{
					$scope.filter_sort_by_value = '-readytotalk';
					$scope.filter_sort_by_value2 = exist_param_sortKeys;
					$scope.filter_sort_by_value3 = '';
				}
				$scope.filter_sort_by = exist_param_sortKeys;
			}
			else
			{
				$scope.filter_sort_by = "";
				$scope.filter_sort_by_value = "-readytotalk";
				$scope.filter_sort_by_value2 = "-roleId";
				$scope.filter_sort_by_value3 = "+nativeLanguage";
			}
			//========GET VALUES FROM PARAMETERS
			//--------Update Rates--------//
			$.each($scope.data.results, function(i, item) {
				if($scope.data.results[i].updated == 'no'){
					var srate 	= 0;
					var tmarkup = 0;
					
					if($scope.data.results[i].is_eligible == 1 ){
						srate			=	0.00;
					}else{
						srate 			= $scope.data.results[i].hRate * (1-(-window.configs['VEE_PRICE_PERCENT']['value']) );				
						srate 			= Math.round(parseInt(srate *10000) /100)  /100;
						if($scope.data.results[i].o_mark == '' || $scope.data.results[i].o_mark == 0){
							tmarkup 		= 0;
						}else{
							tmarkup 		= $scope.data.results[i].o_mark;
						}
						srate			=	(srate/1.33);
						var rate		=	(parseFloat(srate) + parseFloat(tmarkup));
						var allrate		=	((parseFloat(srate) + parseFloat(tmarkup))*(0.33));
						srate			=	(allrate+rate);
						srate			=	parseFloat(Math.round(srate * 100) / 100).toFixed(2);
					}
					$scope.data.results[i].hRate = srate;
					$scope.data.results[i].updated = 'yes';
				}
			});
			//--------Update Rates--------//
			
			
			$scope.filteredData = filterFilter($scope.data.results, newVal);
			$scope.totalItems = $scope.filteredData.length;
			$scope.noOfPages = Math.ceil($scope.totalItems / $scope.entryLimit);
			$scope.currentPage = 1;
		}, true);
		
		
		
		$scope.search_data = function(){
			
			var param_langInput1 	= $('#langInput1').val();
			var param_langInput2 	= $('#langInput2').val();
			var param_keywords 		= $('#keywords').val();
			var param_gender 		= $('#gender').val();
			var param_school 		= $('#school').val();
			var param_sch 			= $('#sch').val();
			var param_country 		= $('#country').val();
			var param_province 		= $('#province').val();
			var param_today 		= $('#today').val();
			var param_fromTime 		= $('#fromTime').val();
			var param_toTime 		= $('#toTime').val();
			var param_keyword 		= $('#keyword').val();
			
			//var param_string = window.location.search;
			//var newURLString = window.location.href + "?keywords=andres";
			//window.location.href = newURLString;

			$scope.search = function(item){
				if (	(	!$scope.filter_text 
							|| ($.trim(item.firstName.toLowerCase()+" "+item.lastName.toLowerCase()).indexOf($scope.filter_text.toLowerCase()) != -1)
							|| ($.trim(item.academic.toLowerCase()).indexOf($scope.filter_text.toLowerCase()) != -1)
							|| ($.trim(item.professional.toLowerCase()).indexOf($scope.filter_text.toLowerCase()) != -1)
							|| ($.trim(item.personal.toLowerCase()).indexOf($scope.filter_text.toLowerCase()) != -1)
							|| ($.trim(item.username.toLowerCase()).indexOf($scope.filter_text.toLowerCase()) != -1)
							|| ($.trim(item.email.toLowerCase()).indexOf($scope.filter_text.toLowerCase()) != -1)
							|| ($.trim(item.city.toLowerCase()).indexOf($scope.filter_text.toLowerCase()) != -1)
						) 
						&&
						(
							$scope.filter_language=="English"
							|| ($.trim(item.nativeLanguage.toLowerCase()).indexOf($scope.filter_language.toLowerCase()) != -1)
							|| ($.trim(item.otherLanguage.toLowerCase()).indexOf($.trim($scope.filter_language.toLowerCase())) != -1)
						)
						&&
						(
							$scope.filter_language2=="0"
							|| ($.trim(item.nativeLanguage.toLowerCase()).indexOf($scope.filter_language2.toLowerCase()) != -1)
							|| ($.trim(item.otherLanguage.toLowerCase()).indexOf($scope.filter_language2.toLowerCase()) != -1)
						)
						&&
						(
							$scope.filter_gender=="all"
							|| ($.trim(item.gender).indexOf($scope.filter_gender) != -1)
						)
						&&
						(
							$scope.filter_countries=="0"
							|| ($.trim(item.country_id)!="" && $.trim(item.country_id).indexOf($scope.filter_countries) != -1)
						)
						&&
						(
							$scope.filter_provinces=="0"
							|| ($.trim(item.province_id)!="" && $.trim(item.province_id).indexOf($scope.filter_provinces) != -1)
							|| $scope.filter_countries!="2"
						)
						&&
						(
							$.trim($("#sch").val())==""
							|| $.trim(item.school_id)==$.trim($("#sch").val())
						)
					){
					return true;
					
				}
				return false;
			}
			$scope.currentPage		= 1;
			div_hide();
			scrollToDiv();
			$scope.first_page = 1;
			$scope.last_page = $scope.noOfPagesShow;
			$scope.change_order_by($scope.filter_sort_by);
		}
		$scope.data 			= data.data;
		$scope.filteredData 	= $scope.data.results;
		$scope.totalItems 		= $scope.filteredData.length;
		$scope.entryLimit		= 20;	
		$scope.currentPage		= 1;	
		$scope.noOfPages        = Math.ceil($scope.totalItems / $scope.entryLimit);
		$scope.noOfPagesShow    = 5;
		$scope.first_page = 1;
		$scope.last_page = $scope.noOfPagesShow;	
		function reset_filter()
		{
			self.location.href = BASE_URL+'search/search';
		}
		function scrollToDiv()
		{
			$('html, body').animate({
				scrollTop: $(".search_result_container").position().top
			}, 2000);
		}
		$scope.initialize_map = function(data){
			$( '#static_map_canvas').hide();
			$( '#map_canvas, #bingmap_canvas').show();
			initialize_map(data);
		}		
		//INITIALIZE MAP
		$scope.changePage = function(pageNo)
		{
			scrollToDiv();
			if(pageNo==1)
			{
				$scope.first_page = 1;
				$scope.last_page = $scope.noOfPagesShow;
			}
			else if($("#page_div_"+pageNo).hasClass("first"))
			{
				$scope.first_page = Math.abs(pageNo-$scope.noOfPagesShow)+1;
				$scope.last_page = pageNo;
				if($scope.first_page<1)
				{
					$scope.first_page = 1;
				}
			}
			else if($("#page_div_"+pageNo).hasClass("last"))
			{
				$scope.first_page = pageNo;
				$scope.last_page = pageNo+$scope.noOfPagesShow-1;
				if($scope.last_page>$scope.noOfPages)
				{
					$scope.last_page = $scope.noOfPages;
				}
			}
			if($scope.first_page<1)
			{
				$scope.first_page = 1;
			}
			if($scope.last_page>$scope.noOfPages)
			{
				$scope.last_page = $scope.noOfPages;
			}
			$scope.currentPage = pageNo;
		}
		$scope.changePageFor=function(pageNo)
		{
			scrollToDiv();
			if(pageNo>=$scope.noOfPages)
			{
				$scope.first_page = $scope.noOfPages-$scope.noOfPagesShow+1;
				$scope.last_page = $scope.noOfPages;
				if(pageNo>$scope.noOfPages)
				{
					$scope.currentPage = $scope.noOfPages;
				}
				else
				{
					$scope.currentPage = pageNo;
				}
			}
			else
			{
				$scope.first_page = pageNo;
				$scope.last_page = pageNo+$scope.noOfPagesShow-1;
				$scope.currentPage = pageNo;
			}
			if($scope.last_page>$scope.noOfPages)
			{
				$scope.first_page = $scope.noOfPages-$scope.noOfPagesShow+1;
				$scope.last_page = $scope.noOfPages;
			}
			if($scope.first_page<1)
			{
				$scope.first_page = 1;
			}
			if($scope.last_page>$scope.noOfPages)
			{
				$scope.last_page = $scope.noOfPages;
			}
		}
		$scope.changePageBack=function(pageNo)
		{
			scrollToDiv();
			if(pageNo<=$scope.noOfPagesShow)
			{
				$scope.first_page = 1;
				$scope.last_page = $scope.noOfPagesShow;
				if(pageNo<1)
				{
					$scope.currentPage = 1;
				}
				else
				{
					$scope.currentPage = pageNo;
				}
			}
			else
			{
				$scope.first_page = Math.abs(pageNo-$scope.noOfPagesShow)+1;
				$scope.last_page = pageNo;
				$scope.currentPage = pageNo;
			}
			if($scope.first_page<1)
			{
				$scope.first_page = 1;
				$scope.last_page = $scope.noOfPagesShow;
			}
			if($scope.first_page<1)
			{
				$scope.first_page = 1;
			}
			if($scope.last_page>$scope.noOfPages)
			{
				$scope.last_page = $scope.noOfPages;
			}
		}
		$scope.profileImgResultThumb = function(src)
		{
			if(src=='' || src=="\'\'" || src=="&#39;&#39;"){
				return profileImgNull + '';
			}
			return profileImgPath+'/'+src+ '';
		}
		$scope.profileUrl = function (uid){
			return profileUrlPath+'/'+uid;
		}
		$scope.createClassUrl = function (uid){
			return createClassPath+'/'+uid+'/'+0;
		}
		$scope.getfeedback = function (uid){
			var lodUrl = BASE_URL+'user/getFeedback/uid/'+ uid;
			$('#sendMessageView').load(lodUrl);
			$('#sendMessageView').show();
		}
		$scope.change_order_by = function(order_by)
		{
			if(order_by=="avgRate")
			{
				$scope.filter_sort_by_value = '-readytotalk';
				$scope.filter_sort_by_value2 = '-'+order_by;
				$scope.filter_sort_by_value3 = '';
			}
			else if(order_by=="hRate")
			{
				$scope.filter_sort_by_value = '-readytotalk';
				$scope.filter_sort_by_value2 = order_by;
				$scope.filter_sort_by_value3 = '';
			}
			else
			{
				$scope.filter_sort_by_value = "-readytotalk";
				$scope.filter_sort_by_value2 = "-roleId";
				$scope.filter_sort_by_value3 = "+nativeLanguage";
			}
			$scope.currentPage		= 1;
			$scope.first_page = 1;
			$scope.last_page = $scope.noOfPagesShow;
		}
		$scope.check_province = function(country_id)
		{
			if(country_id==2)
			{
				$("#province").show();
			}
			else
			{
				$("#province").hide();
			}
		}
		$scope.reset_data = function()
		{
			reset_filter();
			$scope.search_data();
			scrollToDiv();	
		}
		$scope.sendBeepBoxMessage = function(uid)
		{ 
			var lodUrl = BASE_URL+'user/load_send_message/uid/'+ uid;
			$('#sendMessageView').load(lodUrl);
			$('#sendMessageView').show();
		}
		$scope.bookNow = function(tid,username,schoolId,hrate)
		{
			bookNow1(tid,username,schoolId);
		}
	});
	//FIRSTLY GET ALL DATA
});
//=====SEARCH CONTROLLER
//=====RANGE FILTER=====
app.filter('range', function() {
  return function(input,startPage,endPage,total) {
		for (var i=startPage; i<=endPage&&i<=total; i++) {
			 input.push(i);
		}
    return input;
  };
});

//=====RANGE FILTER=====
//=====START FROM FUNCTION FOR FILTER
app.filter('startFrom', function () {
	return function (input, start) {
		if (input) {
			start = +start;
			return input.slice(start);
		}
		return [];
	};
});
//=====START FROM FUNCTION FOR FILTER
//=====ANGULAR JS


  
$('#btnSrchRes').click(function() {
	var param_langInput1 	= $('#langInput1').val();
	var param_langInput2 	= $('#langInput2').val();
	var param_keywords 		= $('#keywords').val();
	var param_gender 		= $('#gender').val();
	var param_school 		= $('#school').val();
	var param_sch 			= $('#sch').val();
	var param_country 		= $('#country').val();
	var param_province 		= $('#province').val();
	var param_today 		= $('#today').val();
	var param_fromTime 		= $('#fromTime').val();
	var param_toTime 		= $('#toTime').val();
	var param_keyword 		= $('#keywords').val();
	
	var param_freses 			= $('#free_session').val();
	var param_sortkeys 			= $('#sortKeys').val();
	
	var param_string			=	'?';
	param_string				+=	'freeSes='+param_freses;
	param_string				+=	'&langInput1='+param_langInput1;
	param_string				+=	'&keywords='+param_keywords;
	param_string				+=	'&sortKeys='+param_sortkeys;
	param_string				+=	'&langInput2='+param_langInput2;
	param_string				+=	'&gender='+param_gender;
	param_string				+=	'&school='+param_school;
	param_string				+=	'&sch='+param_sch;
	param_string				+=	'&country='+param_country;
	param_string				+=	'&province='+param_province;
	param_string				+=	'&today='+param_today;
	param_string				+=	'&fromTime='+param_fromTime;
	param_string				+=	'&toTime='+param_toTime;
	
	
	
	
	var newURLString = BASE_URL+'search/search'+ "" + param_string;
	window.location.href = newURLString;
});



