
Create a media upload button button to use in your WordPress admin forms, plugins or themes. 

Features :
- Easy to setup and use
- Customizable : Make this work for your needs
- Tiny ( less than 3 KB )

## Version
1.0

## License
GPL V3 https://www.gnu.org/licenses/gpl-3.0.en.html

## Basic usage


### 1. HTML
```` HTML
<div class="form-group smartcat-uploader">
    <label for="logo">Company logo</label>
    <input type="text" name="logo">
</div>
````

### 2. PHP
```` PHP
// This will load the required dependencies for the WordPress media uploader
// Be sure to set the proper location of wp_media_uploader.js 
function load_admin_libs() {
    wp_enqueue_media();
    wp_enqueue_script( 'wp-media-uploader', DIR_URL . 'wp_media_uploader.js', array( 'jquery' ), 1.0 );
}
add_action( 'admin_enqueue_scripts', 'load_admin_libs' );
````

### 3. JavaScript
```` javascript
$.wpMediaUploader();
````

## Advanced usage
```` javascript
$.wpMediaUploader({

    target : '.smartcat-uploader', // The class wrapping the textbox
    uploaderTitle : 'Select or upload image', // The title of the media upload popup
    uploaderButton : 'Set image', // the text of the button in the media upload popup
    multiple : false, // Allow the user to select multiple images
    buttonText : 'Upload image', // The text of the upload button
    buttonClass : '.smartcat-upload', // the class of the upload button
    previewSize : '150px', // The preview image size
    modal : false, // is the upload button within a bootstrap modal ?
    buttonStyle : { // style the button
        color : '#fff',
        background : '#3bafda',
        fontSize : '16px',                
        padding : '10px 15px',                
    },

});
````

## Preview
![alt text](https://github.com/smartcatdev/WP-Media-Uploader/blob/master/preview.jpg "Preview 1")
![alt text](https://github.com/smartcatdev/WP-Media-Uploader/blob/master/preview2.jpg "Preview 2")

## Developer
Developed by Bilal Hassan
