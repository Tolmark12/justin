 <span class="boldtext">1. How do I install Glider onto my wordpress blog? </span> 
<div class="indent"> 
  <p>There are several files included in the ZIP folder. These include wordpress theme files, plugin files, and photoshop files. To installed your wordpress theme you will first need to upload the theme/plugin files via FTP to your server. </p> 
  <p>First you are going to upload the theme folder. Inside the ZIP folder you downloaded you will see a folder named &quot;theme.&quot; Within it is a folder named &quot;Glider.&quot; Via ftp, upload the &quot;Glider&quot; folder to your Wordpress themes directory. Depending on where you installed Wordpress on your server, the wp themes folder will be located in a path similar to: /public_html/blog/wp-content/themes. </p> 
  <p>Next you need to select Glider and make it your default theme. Click on the design link, and under the themes tab locate Glider from the selection of themes and activate it. Your blog should now be updated with your new theme. </p> 
<p>Finally, once the theme has been activated, you should navigate to the Appearances > Glider Theme Options page. Here you can adjust settings pertaining to theme's display. Once you have adjusted whatever settings you would like to change click the "save" button. You must click the "save" button for the options to be saved to the database. Even if you did not change anything you should click the save button once before using the theme to insure that the database has been written correctly.</p> 
</div> 
<span class="boldtext">2. How do I add the thumbnails to my posts? </span> 
<div class="indent"> 
  <p>Glider utilizes a script called TimThumb to automatically resize images. Whenever you make a new post you will need to add a custom field. Scroll down below the text editor and click on the &quot;custom fields&quot; link. In the &quot;Name&quot; section, input &quot;Thumbnail&quot; (this is case sensitive). In the &quot;Value&quot; area, input the url to your thumbnail image. Your image will automatically be resized and cropped. The image must be hosted on your domain. (this is to protect against bandwidth left) </p> 
  <p><span class="style1">Important Note: You <u>must</u> CHMOD the &quot;cache&quot; folder located in the Glider directory to 777 for this script to work. You can CHMOD (change the permissions) of a file using your favorite FTP program. If you are confused try following <a href="http://www.siteground.com/tutorials/ftp/ftp_chmod.htm"><u>this tutorial</u></a><u>.</u> Of course instead of CHMODing the template folder (as in the tutorial) you would CHMOD the &quot;cache&quot; folder found within your theme's directory. </span></p> 
</div> 
<span class="boldtext">3. How do I add my title/logo? </span> 
<div class="indent">In this theme the title/logo is an image, which means you will need an image editor to add your own text. You can do this by opening the blank logo image located at Photoshop Files/logo_blank.png, or by opening the logo PSD file located at Photoshop Files/logo.psd. Replace the edited logo with the old logo by placing it in the following directory: theme/Glider/images, and naming the file "logo.png". If you need more room, or would like to edit the logo further, you can always do so by opening the original fully layered PSD file located at Photoshop Files/Glider.psd  </div> 
  
 <span class="boldtext">4. How do I add a blog section? </span> 
  <div class="indent"> 
  <p>To create a blog you first need to create a new Blog Category. Once you have created your category and added your blog posts, you need to tell the theme which category you have chosen to be your blog category. To do this, open the Appearances > Glider Theme Options page in wp-admin and click on the General Settings > General tab. Look for the "Blog Category" setting and choose your category from the dropdown list. Once selected, a link to your blog will appear in your navigation bar.
</p> 
</div> 
 
 <span class="boldtext">5. How do I add a portfolio section? </span> 
  <div class="indent"> 
  <p>The portfolio section is post-based, which means each image in the gallery is a WordPress Post. This first thing you need to do is create a category to be your "Portfolio" category. You can name this category anything you want. Once you have created your category you need to add posts to it, filling in the "Thumbnail" custom field as explained in the thumbnail settings above for each. Once you have your gallery filled with posts it's time to add it to your homepage. To do this we are going to create a new page. Click Pages > Add New and scroll down below the text editor. Locate and select the "Use For Homepage Portfolio" checkbox. This will reveal a list of categories. Choose your gallery category from the list and publish the page. Now the page will be filled with a gallery of your posts. 
</p> 
</div> 
 
 <span class="boldtext">6. How do I customize the quote on the homepage? </span> 
  <div class="indent"> 
  <p>This can be edited via the Appearances > Glider Theme Options page in wp-admin. Under the General Settings > Homepage tab you will see two fields to control each line of the quote. 
</p> 
</div> 