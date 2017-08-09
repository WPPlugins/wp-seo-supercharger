<div class="wrap">
<?php screen_icon('options-general');?>
<?php
if(isset($_GET['success'])){?>
    <div id="message" class="updated">
        <p><b>Done!</b></p>
    </div>
<?php  }?>
<h2>WP SEO Supercharger</h2>
<div id="poststuff">
	<div id="post-body" class="metabox-holder columns-2">
		<div id="post-body-content">
				<div id="wp_seo_supercharger-tabs">
					<form method="post" enctype="multipart/form-data">
					<?php wp_nonce_field( 'wp_seo_supercharger_settings_page', 'wp_seo_supercharger_settings_page' ); ?>
					<ul class="hide-if-no-js">
					<li><a href="#how-it-works">How it works</a></li>
					<li><a href="#general-settings">General Settings</a></li>
					<li><a href="#post-settings">Post Settings</a></li>
					</ul>

					<div class="section" id="how-it-works">
					<h3 class="hide-if-js">How it works</h3>
					<p>Basically, <strong>WP SEO Supercharger</strong> will retrieve a list of related posts from your site and compile them into one <strong>new post</strong> based on <strong>search query</strong>!</p>
					<h4>Questions & Answers</h4>

					<p><strong>Q:</strong> What if visitor is from Google SSL?</p>
					<p><strong>A:</strong> Google <a target="_blank" href="http://support.google.com/websearch/bin/answer.py?hl=en&answer=173733">SSL search</a> encrypt search queries. We can't do anything about it.</p>

					<p><strong>Q:</strong> Can I filter search query?</p>
					<p><strong>A:</strong> Yes you can do this in <a href="#" class="click_general_settings"><strong>General Settings</strong></a>.</p>

					<p><strong>Q:</strong> How do you retrieve related posts?</p>
					<p><strong>A:</strong> We provides three methods: search, category and tag.  We'll try every method in the order you chosen to find related posts. To make it work with different types of pages (Post, Page, Archive, Home, 404, etc,..), we highly recommend <strong>search</strong> method.</p>

					<p><strong>Q:</strong> How category and tag works?</p>
					<p><strong>A:</strong> When people landed in a post from search engine, say PA, we'll use PA's category and tag to find related posts. Unfortunately, it works with Post only since other types of pages don't have category and tags.</p>

					<p><strong>Q:</strong> What if a post has multiple categories and tags?</p>
					<p><strong>A:</strong> We'll pick up a category/tag randomly. If no other posts found under that catgeory/tag, we'll choose another one.</p>

					<p><strong>Q:</strong> How <strong>search</strong> method works?</p>
					<p><strong>A:</strong> Essentially, we'll be using wordpress built-in serach functioning with search query to find the related post. It works the same way as the search box in your sidebar. </p>

					<p><strong>Q:</strong> Can I customize the new post?</p>
					<p><strong>A:</strong> We provide an option called <strong>Related Post Template</strong> in <a href="#" class="click_post_settings"><strong>Post Settings</strong></a> to make the new post more customized.</p>
					<p>Currently, we support: <strong>[rimage_url]</strong> will be the URL of the first image in that related post if any. <strong>[rpost_title]</strong> is related post's title.
					<strong>[rpost_content]</strong> is related post's full content and you can also do this <strong>[rpost_content:200]</strong> to use first 200 letters only. <strong>[rpost_link]</strong> is related post's link. Besides, it supports HTML code.</p>
					<p><strong>Important Note:</strong> We'll remove &lt;img&gt; html tag from the related post template if no image URL found.</p>

					<p><strong>Q:</strong> Will it generate duplicate post?</p>
					<p><strong>A:</strong> First, we won't retrieve the post that's generated by WPSS as related post. Second, we provide an option in <a href="#" class="click_post_settings"><strong>Post Settings</strong></a> to disable duplicate post when post entitled search query already exists. </p>


					</div><!-- /section -->

					<div class="section" id="general-settings">
						<h3 class="hide-if-js">General Settings</h3>
						<p><strong>Search Query Blacklist: </strong> <input type="text" class="regular-text" name="search_query_blacklist" value="<?php echo implode(',',$search_query_blacklist);?>" /></p>
						<p class="howto">Separated by comma</p>
						<p><strong>Email Notification: </strong> <input type="checkbox" name="email_notification" <?php checked($email_notification,true);?> /></p>
							<p class="howto">When a post is created based on search query, we'll notify you with details, including your keyword position!</p>
						<p id="your_email"><strong>Your Email: </strong> <input type="text" class="medium-text" name="email" value="<?php echo $email;?>" /></p>

						<p><input type="submit" class="button-primary" value="Save Changes" name="save_general_settings" /></p>
					</div>
					<div class="section" id="post-settings">
						<h3 class="hide-if-js">Post Settings</h3>
 							<p><strong>Related Post Retrieveing Methods: </strong> <input type="text" class="medium-text" name="methods" value="<?php echo implode(',',$methods);?>" /></p>
							<p class="howto">Methods supported: <strong> search,category,tag</strong>. Separated by comma</p>
							<p><strong>Maximum Number Of Related Posts: </strong> <input type="text" class="small-text" name="post_num" value="<?php echo $post_num;?>" /></p>
							<p><strong>Exclude Posts: </strong> <input type="text" class="regular-text" name="exclude_posts" value="<?php echo implode(",",$exclude_posts);?>" /></p>
							<p class="howto">Excluding posts that you don't want to be retrieved. <strong>Post IDs</strong> separated by comma.</p>

							<p><strong>Exclude Category: </strong> <?php $this->print_exclude_category($exclude_category)?></p>
							<p class="howto">Excluding category that you don't want to retrieve posts from. </p>


							<p><strong>Related Post Template: </strong></p>
							<textarea name="post_template" cols="50" rows="5"><?php echo esc_textarea( $post_template )?></textarea>
							<p class="howto"><strong>Available tags</strong>: [rimage_url],[rpost_title],[rpost_content],[rpost_content:200],[rpost_link] </p>
							<p class="howto">For detailed information, look at <a href="#" class="click_howitworks">"Can I customized the new post"</a> in the Q&A</p>

							<p><strong>New Post Title: </strong> <input type="text" class="medium-text" name="post_title" value="<?php echo $post_title;?>"></p>

							<p class="howto">You can append or prepend text to [search_query].</p>

							<p><strong>New Post Status: </strong> publish <input type="radio" name="post_status" value="publish" <?php checked($post_status,'publish');?> /> draft <input type="radio" name="post_status" value="draf" <?php checked($post_status,'draft');?> /> <!--<span id="redirect_visitor">redirect visitor to new post: <input type="checkbox" name="redirect_to_new" <?php checked($redirect_to_new,true);?> /></span>--></p>

							<p><strong>New Post Category: </strong> <?php $this->print_post_category($post_category);?></p>

							<p><strong>Allow Duplicate Post: </strong> : <input type="checkbox" name="allow_duplicate_post" <?php checked($allow_duplicate_post,true);?> /></p>

							<p class="howto">What if a post entitled search query already exists?</p>

							<p><input type="submit" class="button-primary" value="Save Changes" name="save_post_settings" /></p>

						</form>
					</div>

				</div><!-- /wp_seo_supercharger-tabs -->
		</div><!-- /post-body-content -->

		<div id="postbox-container-1" class="postbox-container">
			<div id="side-sortables" class="meta-box-sortables ui-sortable">
				<div class="postbox ">
					<div class="handlediv" title="Click to toggle"><br></div><h3 class="hndle"><span>About the plugin</span></h3>
											<div class="inside">
							    				 <p><a style="padding:4px 4px 4px 50px;display:block;background-repeat:no-repeat;background-position:5px 50%;text-decoration:none;border:none;background-image:url(<?php echo $this->plugin_url.'/static/images/logo.png';?>);" target="_blank" href="http://www.wpactions.com">Author's website</a></p>
							    				 <p><a style="padding:4px 4px 4px 50px;display:block;background-repeat:no-repeat;background-position:5px 50%;text-decoration:none;border:none;background-image:url(<?php echo $this->plugin_url.'/static/images/request.png';?>);" target="_blank" href="http://www.wpactions.com/998/wp-seo-supercharger">Feature Request</a></p>
							    				 <p><a style="padding:4px 4px 4px 50px;display:block;background-repeat:no-repeat;background-position:5px 50%;text-decoration:none;border:none;background-image:url(<?php echo $this->plugin_url.'/static/images/bug.png';?>);" target="_blank" href="http://www.wpactions.com/998/wp-seo-supercharger">Bug Report</a></p>
							    				 <p><a style="padding:4px 4px 4px 50px;display:block;background-repeat:no-repeat;background-position:5px 50%;text-decoration:none;border:none;background-image:url(<?php echo $this->plugin_url.'/static/images/coffee.jpg';?>);" target="_blank" href="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=chinsungli%40gmail%2ecom&lc=C2&item_name=wpss%20buy%20me%20a%20coffee&amount=5%2e00&currency_code=USD&button_subtype=services&bn=PP%2dBuyNowBF%3abtn_buynowCC_LG%2egif%3aNonHosted">Buy Me A Coffee</a></p>
											</div>
				</div>
			</div>
		</div>
	</div><!-- /post-body -->
<br class="clear">
</div>




</div>
