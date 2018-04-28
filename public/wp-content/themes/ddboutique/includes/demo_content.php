<?php

/* script to add demo content to the theme
 this is only run once. after it runs the option mbudm_demo_content is set to true */

		$demo_terms = array(
						array('term'=>'News','tax'=>'category','desc'=>'All the latest news from our site','slug'=>'news'),
						array('term'=>'Cat one','tax'=>'mbudm_product_category','desc'=>'The Cat one product category is part of the default demonstration content that you can import into this theme to get started.','slug'=>'cat-one','term_meta'=>array('category_color'=>'#cc0')),
						array('term'=>'Cat two','tax'=>'mbudm_product_category','desc'=>'The Cat two product category is part of the default demonstration content that you can import into this theme to get started.','slug'=>'cat-two','term_meta'=>array('category_color'=>'#693')),
						array('term'=>'Cat three','tax'=>'mbudm_product_category','desc'=>'The Cat three product category is part of the default demonstration content that you can import into this theme to get started.','slug'=>'cat-three','term_meta'=>array('category_color'=>'#b84'))
		);
		$demo_posts = array(
						array('post_title'=>'Home','post_content'=>'', 'post_name'=>'home', 'post_type'=>'page', 'meta'=>array('_wp_page_template'=>'mb_home.php') ),
						array('post_title'=>'Products', 'post_content'=>'' ,'post_name'=>'products', 'post_type'=>'page', 'meta'=>array('_wp_page_template'=>'mb_products.php') ),
						array('post_title'=>'Samples', 'post_content'=>'This is the free downloads page template which provides easy access to your free samples and promotes your related products. This page can list all your downloads or if you prefer it will display only the featured downloads. This page is a great landing page for advertising campaigns - you can even target a specific category by using the product category tabs below.' ,'post_name'=>'downloads', 'post_type'=>'page', 'meta'=>array('_wp_page_template'=>'mb_downloads.php') ),
						array('post_title'=>'Checkout', 'post_content'=>'This is the Checkout page where your visitors can pay for their purchases. The checkout page is integrated with PayPal Digital Goods Express Checkout - a fast and hassle free way for your customers to pay for their digital goods.', 'post_name'=>'checkout', 'post_type'=>'page', 'meta'=>array('_wp_page_template'=>'mb_checkout.php') ),
						array('post_title'=>'Your Account', 'post_content'=>'This is the customer account page where your visitors can access their files. Customers are automatically provided with login details so that they can securely download their purchases.', 'post_name'=>'your-account', 'post_type'=>'page', 'meta'=>array('_wp_page_template'=>'mb_transactions.php','loggedout_title'=>'Sign in','loggedout_content'=>'This is the the Transactions page template. On this page customers can access their purchases. If a user is not a customer or not signed in, then they see a signed out message like this one.') ),
						array('post_title'=>'About Us', 'post_content'=>'<p>This is the widget demo page - it uses the MBU Full Width template, which provides you with a blank canvas to create a completely customised page. Using the layout shortcodes you can add any size column and with the widget via shortcode functionality you can also add as many widgets as you like. Not convinced? To start  we can create a two column layout;</p>

<hr />

[section class="col1"]
<h2>Column one</h2>
<p>Your content for the column col1. This can be text, images or another shortcode, if for example you want to add a widget you can. For example we can add the mailing list widget in here.</p>
[widget_via_shortcode widget_name="mb_Mailing_List_Widget"]
[/section]

[section class="col2"]
<h2>Column two</h2>
<p>Your content for the column col2. This can be text, images or another shortcode, if for example you want to add a widget you can. For example we can add the buy promo widget in here.</p>

[widget_via_shortcode widget_name="mb_Buy_Promo_Widget"]
[/section]

<hr />

<h2>Three columns</h2>
<p>That was nifty - how about a three column layout then? Add a text widget in each.</p>
[section class="col3"]
[widget_via_shortcode widget_name="mb_Text_Widget" invert_color="1" display_mode="edged-shaded" freetext="This is a text widget in column 1 that is inverted and has the edged-shaded style."]
[/section]
[section class="col4"]
[widget_via_shortcode widget_name="mb_Text_Widget" display_mode="edged" freetext="This is a text widget in column 2 that is not inverted and has the edged style."]
[/section]
[section class="col5"]
[widget_via_shortcode widget_name="mb_Text_Widget" display_mode="shaded" freetext="This is a text widget in column 3 that is not inverted and has the shaded style."]
[/section]

<hr />

<h2>One quarter/three quarters layout</h2>
<p>On to another common layout style - having a thin column at left and a fat column at right. You can do that too with the layout shortcodes.</p>

[section class="col6"]
<h3>Column one</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sollicitudin semper semper. Duis id lectus augue, sagittis viverra dui. Etiam ligula tortor, commodo vitae ornare sed, accumsan eu nulla. Phasellus aliquet ornare feugiat. Maecenas aliquam purus ut felis mollis bibendum.</p>
[/section]
[section class="col7"]
<h3>Column two</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sollicitudin semper semper. Duis id lectus augue, sagittis viverra dui. Etiam ligula tortor, commodo vitae ornare sed, accumsan eu nulla. Phasellus aliquet ornare feugiat. Maecenas aliquam purus ut felis mollis bibendum. Etiam faucibus, augue dictum ornare vehicula, ipsum tellus varius orci, sit amet vehicula risus nisi at sem. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>

<p>Etiam vitae nisi ut lacus volutpat mollis non suscipit nisl. Ut et est risus, vel ornare purus. Phasellus quam odio, dapibus sit amet molestie sed, sagittis porta quam. In venenatis tristique leo, mattis laoreet sem sagittis eu. Mauris ultrices, elit sed fermentum suscipit, mi nibh elementum arcu, ut tincidunt sapien neque id felis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus non felis lectus.</p>

[/section]

<hr />

<h2>Three quarters/one quarter layout</h2>
<p>Occasionally you may even need to reverse this layout so that the thin column is on the right and the fat column is on the left.</p>

[section class="col8"]
<h3>Column one</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sollicitudin semper semper. Duis id lectus augue, sagittis viverra dui. Etiam ligula tortor, commodo vitae ornare sed, accumsan eu nulla. Phasellus aliquet ornare feugiat. Maecenas aliquam purus ut felis mollis bibendum. Etiam faucibus, augue dictum ornare vehicula, ipsum tellus varius orci, sit amet vehicula risus nisi at sem. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>

<p>Etiam vitae nisi ut lacus volutpat mollis non suscipit nisl. Ut et est risus, vel ornare purus. Phasellus quam odio, dapibus sit amet molestie sed, sagittis porta quam. In venenatis tristique leo, mattis laoreet sem sagittis eu. Mauris ultrices, elit sed fermentum suscipit, mi nibh elementum arcu, ut tincidunt sapien neque id felis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus non felis lectus.</p>

[/section]
[section class="col9"]
<h3>Column two</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sollicitudin semper semper. Duis id lectus augue, sagittis viverra dui. Etiam ligula tortor, commodo vitae ornare sed, accumsan eu nulla. Phasellus aliquet ornare feugiat. Maecenas aliquam purus ut felis mollis bibendum.</p>

[/section]
[clear]

<p>Notice that if you resize the browser - the responsive CSS works beautifully, these columns adapt to the smaller screen so that they always look good.</p>', 'post_name'=>'about-us', 'post_type'=>'page', 'meta'=>array('_wp_page_template'=>'mb_fullwidth.php') ),
						array('post_title'=>'Contact Us', 'post_content'=>'This is a default page that has a contact form added via shortcode. You can use any form plugin that you like to create the contact form. On <a href="http://linguaposta.com/contact-us/">Linguaposta.com</a> and the ThemeForest demo I am using <a href="http://wordpress.org/extend/plugins/contact-form-7/" >Contact Form 7</a>.', 'post_name'=>'contact', 'post_type'=>'page', 'meta'=>array('_wp_page_template'=>'default') ),
						array('post_title'=>'Mailing list', 'post_content'=>'This is a default page that has a the mailing list forms widget added via shortcode. The mailing list forms widget is a part of the mailing list management features in this theme, which also include easy viewing and exporting of your mailing list subscribers for use in your eMarketing tool of choice.[widget_via_shortcode widget_name="mb_Mailing_List_Widget"]', 'post_name'=>'mailing-list', 'post_type'=>'page', 'meta'=>array('_wp_page_template'=>'default') ),
						array('post_title'=>'News', 'post_content'=>'This is a default page template that is co-opted as the blog posts page.', 'post_name'=>'news', 'post_type'=>'page', 'meta'=>array('_wp_page_template'=>'default') ),
						array('post_title'=>'News item one','post_category'=>array('news'),'post_content'=>'The content of the news item one post','post_excerpt'=>'The excerpt for news item one','post_name'=>'news-item-one','post_type'=>'post','comments'=>array(array('content'=>'Very interesting article, thanks!','author'=>'Bob Jones'),array('content'=>'I completely agree with everything you\'ve said.','author'=>'Sarah Fletcher'))),
						array('post_title'=>'News item two','post_category'=>array('news'),'post_content'=>'The content of the news item two post','post_excerpt'=>'The excerpt for news item two','post_name'=>'news-item-two','post_type'=>'post'),
						array('post_title'=>'News item three','post_category'=>array('news'),'post_content'=>'The content of the news item three post','post_excerpt'=>'The excerpt for news item three','post_name'=>'news-item-three','post_type'=>'post'),
						array('post_title'=>'News item four','post_category'=>array('news'),'post_content'=>'The content of the news item four post','post_excerpt'=>'The excerpt for news item four','post_name'=>'news-item-four','post_type'=>'post'),
						array('post_title'=>'News item five','post_category'=>array('news'),'post_content'=>'The content of the news item two five','post_excerpt'=>'The excerpt for news item five','post_name'=>'news-item-five','post_type'=>'post'),
						array('post_title'=>'Product one','post_content'=>'The content of the product item one','post_excerpt'=>'The excerpt for product one','post_name'=>'product-one','post_type'=>'mbudm_product', 'tax_input' =>array( 'mbudm_product_category' => array( 'cat-one' )), 'meta'=>array('Size'=> 'Large','Level' =>	'Advanced','_mbudm_price'=>'10.99'),'comments'=>array(array('content'=>'This is an excellent product. I use it every day.','author'=>'Bob Jones'))),
						array('post_title'=>'Product two','post_content'=>'The content of the product item two','post_excerpt'=>'The excerpt for product two','post_name'=>'product-two','post_type'=>'mbudm_product', 'tax_input' =>array( 'mbudm_product_category' => array( 'cat-three' )),'meta'=>array('Size'=> 'Extra Large','Level' =>	'Intermediate','_mbudm_price'=>'7.99')),
						array('post_title'=>'Product four','post_content'=>'The content of the product item four','post_excerpt'=>'The excerpt for product four','post_name'=>'product-four','post_type'=>'mbudm_product', 'tax_input' =>array( 'mbudm_product_category' => array( 'cat-two' )), 'sticky'=>1, 'meta'=>array('Size'=> 'Small','Level' =>	'Beginner','_mbudm_price'=>'8.99')),
						array('post_title'=>'Product five','post_content'=>'The content of the product item five','post_excerpt'=>'The excerpt for product five','post_name'=>'product-five','post_type'=>'mbudm_product', 'tax_input' =>array( 'mbudm_product_category' => array( 'cat-one' )), 'meta'=>array('Size'=> 'Large','Level' =>	'Advanced','_mbudm_price'=>'1.99')),
						array('post_title'=>'Product six','post_content'=>'The content of the product item six','post_excerpt'=>'The excerpt for product six','post_name'=>'product-six','post_type'=>'mbudm_product', 'tax_input' =>array( 'mbudm_product_category' => array( 'cat-three' )), 'sticky'=>1, 'meta'=>array('Size'=> 'Extra Large','Level' =>	'Intermediate','_mbudm_price'=>'13.99')),
						array('post_title'=>'Product three','post_content'=>'The content of the product item three','post_excerpt'=>'The excerpt for product three','post_name'=>'product-three','post_type'=>'mbudm_product', 'tax_input' =>array( 'mbudm_product_category' => array( 'cat-two' )), 'meta'=>array('Size'=> 'Small','Level' =>	'Beginner','_mbudm_price'=>'18.99')),
						array('post_title'=>'Product seven','post_content'=>'The content of the product item seven','post_excerpt'=>'The excerpt for product seven','post_name'=>'product-seven','post_type'=>'mbudm_product', 'tax_input' =>array( 'mbudm_product_category' => array( 'cat-one' )), 'sticky'=>1, 'meta'=>array('Size'=> 'Large','Level' =>	'Advanced','_mbudm_price'=>'6.99')),
						array('post_title'=>'Product eight','post_content'=>'The content of the product item eight','post_excerpt'=>'The excerpt for product eight','post_name'=>'product-eight','post_type'=>'mbudm_product', 'tax_input' =>array( 'mbudm_product_category' => array( 'cat-three' )), 'sticky'=>1, 'meta'=>array('Size'=> 'Extra Large','Level' =>	'Intermediate','_mbudm_price'=>'8.99')),
						array('post_title'=>'Product nine','post_content'=>'The content of the product item nine','post_excerpt'=>'The excerpt for product nine','post_name'=>'product-nine','post_type'=>'mbudm_product', 'tax_input' =>array( 'mbudm_product_category' => array( 'cat-two' )), 'meta'=>array('Size'=> 'Small','Level' =>	'Beginner','_mbudm_price'=>'14.99')),
						array('post_title'=>'Sample one','post_content'=>'The content of the free sample one','post_excerpt'=>'The excerpt for free sample one','post_name'=>'download-one','post_type'=>'mbudm_download', 'tax_input' =>array( 'mbudm_product_category' => array( 'cat-one' )), 'meta'=>array('Size'=> 'Large','Level' =>	'Advanced','File type'=>'PDF','_mb_related_product_title'=>'Upgrade to Product one','_mb_related_product_text'=>'This download is related to Product one, this promo text can encourage the visitor to upgrade from the free sample to the full price product.')),
						array('post_title'=>'Sample two','post_content'=>'The content of the free sample two','post_excerpt'=>'The excerpt for free sample two','post_name'=>'download-two','post_type'=>'mbudm_download', 'tax_input' =>array( 'mbudm_product_category' => array( 'cat-three' )), 'meta'=>array('Size'=> 'Extra Large','Level' =>	'Intermediate','File type'=>'PDF','_mb_related_product_title'=>'Upgrade to Product two','_mb_related_product_text'=>'This download is related to Product two, this promo text can encourage the visitor to upgrade from the free sample to the full price product.')),
						array('post_title'=>'Sample four','post_content'=>'The content of the free sample four','post_excerpt'=>'The excerpt for free sample four','post_name'=>'download-four','post_type'=>'mbudm_download', 'tax_input' =>array( 'mbudm_product_category' => array( 'cat-two' )), 'sticky'=>1, 'meta'=>array('Size'=> 'Small','Level' =>	'Beginner','File type'=>'PDF','_mb_related_product_title'=>'Upgrade to Product four','_mb_related_product_text'=>'This download is related to Product four, this promo text can encourage the visitor to upgrade from the free sample to the full price product.')),
						array('post_title'=>'Sample five','post_content'=>'The content of the free sample five','post_excerpt'=>'The excerpt for free sample five','post_name'=>'download-five','post_type'=>'mbudm_download', 'tax_input' =>array( 'mbudm_product_category' => array( 'cat-one' )),  'sticky'=>1,'meta'=>array('Size'=> 'Large','Level' =>	'Advanced','File type'=>'PDF','_mb_related_product_title'=>'Upgrade to Product five','_mb_related_product_text'=>'This download is related to Product five, this promo text can encourage the visitor to upgrade from the free sample to the full price product.')),
						array('post_title'=>'Sample six','post_content'=>'The content of the free sample six','post_excerpt'=>'The excerpt for free sample six','post_name'=>'download-six','post_type'=>'mbudm_download', 'tax_input' =>array( 'mbudm_product_category' => array( 'cat-three' )), 'meta'=>array('Size'=> 'Extra Large','Level' =>	'Intermediate','File type'=>'PDF','_mb_related_product_title'=>'Upgrade to Product six','_mb_related_product_text'=>'This download is related to Product six, this promo text can encourage the visitor to upgrade from the free sample to the full price product.')),
						array('post_title'=>'Sample three','post_content'=>'The content of the free sample three','post_excerpt'=>'The excerpt for free sample three','post_name'=>'download-three','post_type'=>'mbudm_download', 'tax_input' =>array( 'mbudm_product_category' => array( 'cat-two' )), 'sticky'=>1, 'meta'=>array('Size'=> 'Small','Level' =>	'Beginner','File type'=>'PDF','_mb_related_product_title'=>'Upgrade to Product three','_mb_related_product_text'=>'This download is related to Product three, this promo text can encourage the visitor to upgrade from the free sample to the full price product.'),'comments'=>array(array('content'=>'Wow, what a find and you give away free samples too - I love it!','author'=>'Raj Patel'))),
						array('filename'=>'image_1.jpg','post_title'=>'Image one','post_content'=>'The description for image one','post_excerpt'=>'The caption for image one','post_type'=>'attachment'),
						array('filename'=>'image_2.jpg','post_title'=>'Image two','post_content'=>'The description for image two','post_excerpt'=>'The caption for image two','post_type'=>'attachment'),
						array('filename'=>'image_3.jpg','post_title'=>'Image three','post_content'=>'The description for image three','post_excerpt'=>'The caption for image three','post_type'=>'attachment'),
						array('filename'=>'image_4.jpg','post_title'=>'Image four','post_content'=>'The description for image four','post_excerpt'=>'The caption for image four','post_type'=>'attachment'),
						array('filename'=>'image_5.jpg','post_title'=>'Image five','post_content'=>'The description for image five','post_excerpt'=>'The caption for image five','post_type'=>'attachment'),
						array('filename'=>'image_6.jpg','post_title'=>'Image six','post_content'=>'The description for image six','post_excerpt'=>'The caption for image six','post_type'=>'attachment'),
						array('filename'=>'image_7.jpg','post_title'=>'Image seven','post_content'=>'The description for image seven','post_excerpt'=>'The caption for image seven','post_type'=>'attachment'),
						array('filename'=>'image_8.jpg','post_title'=>'Image eight','post_content'=>'The description for image eight','post_excerpt'=>'The caption for image eight','post_type'=>'attachment'),
						array('filename'=>'image_9.jpg','post_title'=>'Image nine','post_content'=>'The description for image nine','post_excerpt'=>'The caption for image nine','post_type'=>'attachment'),
						array('filename'=>'sample_1.jpg','post_title'=>'Image one','post_content'=>'The description for sample image one','post_excerpt'=>'The caption for sample image one','post_type'=>'attachment'),
						array('filename'=>'sample_2.jpg','post_title'=>'Image two','post_content'=>'The description for sample image two','post_excerpt'=>'The caption for sample image two','post_type'=>'attachment'),
						array('filename'=>'sample_3.jpg','post_title'=>'Image three','post_content'=>'The description for sample image three','post_excerpt'=>'The caption for sample image three','post_type'=>'attachment'),
						array('filename'=>'sample_4.jpg','post_title'=>'Image four','post_content'=>'The description for sample image four','post_excerpt'=>'The caption for sample image four','post_type'=>'attachment'),
						array('filename'=>'sample_5.jpg','post_title'=>'Image five','post_content'=>'The description for sample image five','post_excerpt'=>'The caption for sample image five','post_type'=>'attachment'),
						array('filename'=>'sample_6.jpg','post_title'=>'Image six','post_content'=>'The description for sample image six','post_excerpt'=>'The caption for sample image six','post_type'=>'attachment'),
						array('filename'=>'product-preview.pdf','post_title'=>'Product Preview','post_content'=>'This is a demonstration product preview pdf','post_type'=>'attachment'),
						array('filename'=>'download-preview.pdf','post_title'=>'Download Preview','post_content'=>'This is a demonstration download preview pdf','post_type'=>'attachment')
		);
		
		// easier to do relational as a separate arr this is quicker too as the slugs/post_names can be used with dp_id_lookup
		$demo_posts_meta = array(
			'download-one'=>array(
				'_thumbnail_id' =>'sample_1.jpg',
				'_mbudm_related_product' =>'product-one',
				MBUDM_MK_PREVIEW_FILE =>'download-preview.pdf'
			),
			'download-two'=>array(
				'_thumbnail_id' =>'sample_2.jpg',
				'_mbudm_related_product' =>'product-two',
				MBUDM_MK_PREVIEW_FILE =>'download-preview.pdf'
			),
			'download-three'=>array(
				'_thumbnail_id' =>'sample_3.jpg',
				'_mbudm_related_product' =>'product-three',
				MBUDM_MK_PREVIEW_FILE =>'download-preview.pdf'
			),
			'download-four'=>array(
				'_thumbnail_id' =>'sample_4.jpg',
				'_mbudm_related_product' =>'product-four',
				MBUDM_MK_PREVIEW_FILE =>'download-preview.pdf'
			),
			'download-five'=>array(
				'_thumbnail_id' =>'sample_5.jpg',
				'_mbudm_related_product' =>'product-five',
				MBUDM_MK_PREVIEW_FILE =>'download-preview.pdf'
			),
			'download-six'=>array(
				'_thumbnail_id' =>'sample_6.jpg',
				'_mbudm_related_product' =>'product-six',
				MBUDM_MK_PREVIEW_FILE =>'download-preview.pdf'
			),
			'product-one'=>array(
				'_thumbnail_id' =>'image_1.jpg',
				MBUDM_MK_PREVIEW_FILE =>'product-preview.pdf'
			),
			'product-two'=>array(
				'_thumbnail_id' =>'image_2.jpg',
				MBUDM_MK_PREVIEW_FILE =>'product-preview.pdf'
			),
			'product-three'=>array(
				'_thumbnail_id' =>'image_3.jpg',
				MBUDM_MK_PREVIEW_FILE =>'product-preview.pdf'
			),
			'product-four'=>array(
				'_thumbnail_id' =>'image_4.jpg',
				MBUDM_MK_PREVIEW_FILE =>'product-preview.pdf'
			),
			'product-five'=>array(
				'_thumbnail_id' =>'image_5.jpg',
				MBUDM_MK_PREVIEW_FILE =>'product-preview.pdf'
			),
			'product-six'=>array(
				'_thumbnail_id' =>'image_6.jpg',
				MBUDM_MK_PREVIEW_FILE =>'product-preview.pdf'
			),
			'product-seven'=>array(
				'_thumbnail_id' =>'image_7.jpg',
				MBUDM_MK_PREVIEW_FILE =>'product-preview.pdf'
			),
			'product-eight'=>array(
				'_thumbnail_id' =>'image_8.jpg',
				MBUDM_MK_PREVIEW_FILE =>'product-preview.pdf'
			),
			'product-nine'=>array(
				'_thumbnail_id' =>'image_9.jpg',
				MBUDM_MK_PREVIEW_FILE =>'product-preview.pdf'
			),
		);
		$demo_menus = array(
										array('name'=>'Main menu',
												'location'=>'primary_nav',
												'items'=>array(
													array('title'=>'Home','desc'=>'Home page','page-slug' => 'home'),
													array('title'=>'Products','desc'=>'Products page','page-slug' => 'products'),
													array('title'=>'Free Samples','desc'=>'Free Samples Download page','page-slug' => 'downloads'),
													array('title'=>'Checkout', 'desc'=>'Checkout','page-slug' => 'checkout')
												)
										),
										array('name'=>'Footer menu',
												'location'=>'footer_nav',
												'items'=>array(
													array('title'=>'About Us','desc'=>'About Us page','page-slug' => 'about-us'),
													array('title'=>'Contact Us','desc'=>'Contact Us page','page-slug' => 'contact'),
													array('title'=>'Mailing List','desc'=>'Mailing List page','page-slug' => 'mailing-list'),
													array('title'=>'News', 'desc'=>'News page (posts page)','page-slug' => 'news')
												)
										),
										array('name'=>'Header menu (Logged out)',
												'location'=>'header_nav_logged_out',
												'items'=>array(
													array('title'=>'Sign in','desc'=>'Sign in to your account','page-slug' => 'your-account')
												)
										),
										array('name'=>'Header menu (Logged in)',
												'location'=>'header_nav_logged_in',
												'items'=>array(
													array('title'=>'Your account','desc'=>'Your account','page-slug' => 'your-account')
												)
										)
									);
		// use update_post_meta instead with a meta key of _wp_page_template.
		$demo_options = array();
		
		$extra_content = array(
			'Vivamus sit amet purus a libero dictum blandit id ut purus.',
			'Nullam aliquam sollicitudin justo suscipit laoreet. Vestibulum nisi libero, volutpat ut egestas sed, ornare sit amet nulla. Phasellus nec arcu non urna porta fermentum a eget enim. Mauris ultrices luctus urna quis lobortis. Praesent sem quam, gravida hendrerit rutrum sed, vehicula commodo tellus.  ',
			'Suspendisse libero felis, congue sed pharetra et, bibendum et sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras in sapien non arcu porttitor venenatis sodales at nisi. Suspendisse sit amet turpis eget risus vulputate convallis tincidunt non arcu. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec id odio ligula. '
		);
 		/*
 		echo('<pre>');
 		print_r($demo_terms);
 		echo('</pre>');
 		*/
 		//terms
 		foreach($demo_terms as $demo_term){
			$tid = wp_insert_term(
				$demo_term['term'], 
				$demo_term['tax'], 
				array(
					'description'=> $demo_term['desc'],
					'slug' => $demo_term['slug']
				)
			);
			$demo_term['id'] = $tid['term_id'];
			
			if(isset($demo_term['term_meta'])){
				//term meta
				add_option( "taxonomy_".$tid['term_id'], $demo_term['term_meta']);
			}
 		}
 		
 		//posts
 		// demo content is inside the theme folder (images & pdfs)
 		$dp_lookup = array(); //store the slug and id for doing relational stuff after
 		$dc_dir = get_theme_root() . '/' . TEMPLATE_DOMAIN . '/demo_content/';
 		
 		//dates for randomising publication of posts and comments
 		$ts_now = time();
 		$ts_minus_one_year = strtotime('-2 year', $ts_now);
 		
 		$sticky_posts = array();
 		
 		foreach($demo_posts as $demo_post){
 			switch($demo_post['post_type']){
 				case 'attachment':
 					//Media
 					$mb_upload_dir = get_option('mbudm_uploads_directory');
					//copy image to uploads folder
 					
					$filename = $demo_post['filename'];
					$copiedFile  = $dc_dir . $filename;
					$pastedFile = $mb_upload_dir  . '/' .  _wp_relative_upload_path( $filename );
				
					if ( !copy($copiedFile,$pastedFile) ) {
						echo "failed to copy $copiedFile to  $pastedFile  ...\n";
					}
 					
 					$wp_filetype = wp_check_filetype(basename($filename), null );
 					$dp_content = isset($demo_post['post_content']) ? $demo_post['post_content'] : '' ;
 					$dp_excerpt = isset($demo_post['post_excerpt']) ? $demo_post['post_excerpt'] : '' ;
					$attachment = array(
						 'guid' => $pastedFile, 
						 'post_mime_type' => $wp_filetype['type'],
						 'post_title' => $demo_post['post_title'],
						 'post_content' => $dp_content,
						 'post_excerpt' => $dp_excerpt,
						 'post_status' => 'inherit'
					  );
					 $attach_id = wp_insert_attachment( $attachment, $pastedFile, 0 );
					 // you must first include the image.php file
					  // for the function wp_generate_attachment_metadata() to work
					  require_once(ABSPATH . 'wp-admin/includes/image.php');
					  $attach_data = wp_generate_attachment_metadata( $attach_id, $pastedFile );
					  wp_update_attachment_metadata( $attach_id, $attach_data );
					  $demo_post['id'] = $attach_id;
					   $dp_id_lookup[$demo_post['filename']] = $attach_id;
 				break;
 				default;
 					// posts / pages / custom types
 					// Use copy of demo_post but remove 'meta' 
 					$dp_cleaned = $demo_post;
 					unset($dp_cleaned['meta']);
 					unset($dp_cleaned['tax_input']); // see note below
 					unset($dp_cleaned['comments']); 
 					unset($dp_cleaned['sticky']); 
 			
 					// parse 'post_category' for slugs and convert to term id
 					if(isset($dp_cleaned['post_category'])){
 						$pcatids = array();
 						foreach($dp_cleaned['post_category'] as $pcatslug){
 							$term = term_exists('Uncategorized', 'category');
							if ($term !== 0) {
							  $pcatids[] =  is_array($term) ? $term['term_id'] : $term ;
							}
 						}
 						$dp_cleaned['post_category'] = $pcatids;
 					}
 					
 					if($demo_post['post_type'] == 'mbudm_product' || $demo_post['post_type'] == 'post'){
						//add extra content to products and downloads
						$dp_cleaned['post_excerpt'] .= '. '.$extra_content[0];
						$dp_cleaned['post_content'] = '<p>'. $dp_cleaned['post_content'] .' '.$extra_content[1] . '</p><p>' . $extra_content[2] .'<p>';
						
						//add the dummy product file
						$demo_post['meta']['_mbudm_post_file'] = $dc_dir . 'product.pdf';
					}
					if($demo_post['post_type'] == 'mbudm_download' ){
						//add extra content to products and downloads
						$dp_cleaned['post_excerpt'] .= '. '.$extra_content[0];
						$dp_cleaned['post_content'] = '<p>'. $dp_cleaned['post_content'] .' '.$extra_content[0] . '</p><p>' . $extra_content[2] .'<p>';
						//add the dummy product file
						$demo_post['meta']['_mbudm_post_file'] = $dc_dir . 'download.pdf';
					}
 					//append post author and status
 					$dp_cleaned['post_status'] = 'publish';
					$dp_cleaned['post_author'] = get_current_user_id();
					
					//post date
					$post_date_int = rand($ts_minus_one_year,$ts_now);
					$dp_cleaned['post_date'] = date("Y-m-d H:i:s",$post_date_int);
					
					// Insert the post into the database
					$dp_id = wp_insert_post( $dp_cleaned );
					
				
					/*
					Custom taxonomies
					
					Codex suggests you can pass 'tax_input' to insert_post() with slugs and convert to term id because it takes term slugs as an argument:
					http://codex.wordpress.org/Function_Reference/wp_insert_post
					
					However it looks like it doesn't parse tax_input at all (only note in codex is that user needs permissions), so need to use wp_set_object_terms();
http://wordpress.stackexchange.com/questions/18236/attaching-taxonomy-data-to-post-with-wp-insert-post

					*/
					if(isset($demo_post['tax_input'])){
						foreach($demo_post['tax_input'] as $tax=>$tax_terms){
							wp_set_object_terms($dp_id,$tax_terms,$tax );
						}
					}
					
					//add post_meta
					if(isset($demo_post['meta'])){
						foreach($demo_post['meta'] as $meta_key=>$meta_value){
							add_post_meta($dp_id, $meta_key, $meta_value);
						}
					}
					
					//add post comments 
					if(isset($demo_post['comments'])){
						foreach($demo_post['comments'] as $comment){
							$comment_date_int = rand($post_date_int,$ts_now);
							$data = array(
								'comment_post_ID'=>$dp_id,
								'comment_author'=>$comment['author'],
								'comment_content'=>$comment['content'],
								'comment_date'=> date("Y-m-d H:i:s",$comment_date_int),
								'comment_approved'=>1
							);
							wp_insert_comment($data);
						}
					}
					
					//add to sticky
					if(isset($demo_post['sticky'])){
						$sticky_posts[] = $dp_id;
					}
					
					 $demo_post['id'] = $dp_id;
					 $dp_id_lookup[$demo_post['post_name']] = $dp_id;
 				break;
 			}
 		}

		//update sticky option 
		$sticky_orig = get_option( 'sticky_posts' );
	
		update_option( 'sticky_posts' ,array_merge($sticky_posts, $sticky_orig) );

 		//menus
 		$locations = get_theme_mod('nav_menu_locations');
 		foreach($demo_menus as $demo_menu){
 			$menu_id = wp_create_nav_menu( $demo_menu['name']);
 			$locations[$demo_menu['location']] = $menu_id;
 			foreach($demo_menu['items'] as $demo_menu_item){
 				wp_update_nav_menu_item($menu_id, 0, array('menu-item-title' => $demo_menu_item['title'],
 										   'menu-item-description'=> $demo_menu_item['desc'],
                                           'menu-item-object' => 'page',
                                           'menu-item-object-id' => get_page_by_path($demo_menu_item['page-slug'])->ID,
                                           'menu-item-type' => 'post_type', 
                                           'menu-item-status' => 'publish'));
 			}
 		}
 		set_theme_mod('nav_menu_locations', $locations);
 		
 		
 		// Do relational stuff (have to do after all items are created)
 		// set '_thumbnail_id' for products and downloads
 		// set related product for downloads
 		foreach($demo_posts_meta as $dpm=>$dpm_items){
 			$dpm_id = $dp_id_lookup[$dpm];
 			foreach($dpm_items as $dpmi_key=>$dpmi_val){
 				$dpmi_val_id = $dp_id_lookup[$dpmi_val];
 				add_post_meta($dpm_id, $dpmi_key, $dpmi_val_id);
 			}
 		}
 	
 		//options
 		// - set blog page and home page
 		update_option( 'page_on_front', $dp_id_lookup['home'] );
		update_option( 'show_on_front', 'page' );

		// Set the blog page
		$blog   = get_page_by_title( 'News' );
		update_option( 'page_for_posts', $dp_id_lookup['news'] );
		
		update_option(THEMEPREFIX. '_hide_product_shadow',true);
		update_option(THEMEPREFIX."_hide_widget_blank_message",true);
		
		/* Add dummy users - unused
				
		function fb_wp_insert_user() {
			if(!get_option('mbudm_dummy_users_added')){
				$num_users = 35;
				$sval  = 1;
				for($i = 0; $i < $num_users; $i++){
					$user_data = array(
						'user_pass' => wp_generate_password(),
						'user_login' => 'dummy'.$i,
						'user_nicename' => 'Dummy'.$i,
						'user_email' => 'dummy'.$i.'@example.com',
						'display_name' => 'Dummy'.$i,
						'nickname' => 'dummy'.$i,
						'first_name' => 'Dummy'.$i
					);
					$user_id = wp_insert_user( $user_data );
					// add meta data
					$sval = $sval == 2? 1 : 2 ; 
					add_user_meta( $user_id, '_mbudm_mailing_list', $sval , true );
				}
				
				update_option('mbudm_dummy_users_added',1);
			}
		}
		add_action( 'admin_init', 'fb_wp_insert_user' );
*/

?>
