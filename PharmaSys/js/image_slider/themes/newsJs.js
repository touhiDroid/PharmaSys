function constructTheNewsPage(){

	var newsCount = TouhiDroid.getLatestNewsCount();

	for(var i=0; i<newsCount; i++){		// this news list have been got rid of the i=0:webView item
		$("#slider").append( '<img id="news_image_' + i + '" src="" />' );

		// setting image src & alt
		var head = TouhiDroid.getNewsHead( i );
		TouhiDroid.showLog( "From JS ****** head :: " + head );
		if(head.length > 0) {
			$('#news_image_' + i).attr('alt', head);
		}
		

		var base64Image = TouhiDroid.getNewsImage( i );
		TouhiDroid.showLog( "From JS ****** image :: " + base64Image );
		if(base64Image.length > 100) {
			$('#news_image_' + i).attr('src', "data:image/jpg;base64," + base64Image);
		}
	}

	/*$("#slider").append( 
		"<img src='file:///android_asset/news_slider/themes/is_a.jpg' alt='TouhiDroid 1' />"+
		"<img src='file:///android_asset/news_slider/themes/is_b.jpg' alt='TouhiDroid 2' />"+
		"<img id='img3' src='' alt='TouhiDroid 3' />" +
		"<img src='file:///android_asset/news_slider/themes/is_c.jpg' alt='TouhiDroid 4' />"
	);

	var imgStr = TouhiDroid.getNewsImage();
	if(imgStr.length>100)
		$('#img3').attr('src', imgStr);

	$("#slider").append( 
		"<img src='file:///android_asset/news_slider/themes/is_d.jpg' alt='TouhiDroid 5' />"+
		"<img src='file:///android_asset/news_slider/themes/is_e.jpg' alt='TouhiDroid 6' />"
	);

	TouhiDroid.showLog( "nothing" );
	TouhiDroid.showLog( "From JS ********** ");*/

}