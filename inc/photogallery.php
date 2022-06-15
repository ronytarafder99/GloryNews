<?php

function create_posttype()
{
    register_post_type(
        'photogallery',
        array(
            'labels' => array(
                'name' => __('Photo gallery'),
                'singular_name' => __('photogallery')
            ),
            'public' => true,
            'menu_position'       => 5,
            'supports'            => array('title', 'thumbnail',),
            'has_archive' => true,
            'rewrite' => array('slug' => 'photogallery'),
            'taxonomies'  => array('photogallery', 'photogallery-categories', 'tag'),
        )
    );
}
add_action('init', 'create_posttype');


//Create category for Photo post type
function tr_create_my_taxonomy()
{
    register_taxonomy(
        'photogallery-categories',
        'photogallery',
        array(
            'label' => __('Photogallery Categories'),
            'rewrite' => array('slug' => 'photogallery-category'),
            'hierarchical' => true,
            'has_archive' => true
        )
    );
}
add_action('init', 'tr_create_my_taxonomy');


class picPosts{
    function __construct(){
        add_action('add_meta_boxes',array($this,'meta_box')); 
        add_action( 'save_post', array($this,'save'));
        //support add to upload apks
        add_filter('upload_mimes', array($this,'mime_types'));
    }
		
function mime_types ( $existing_mimes=array() ) {
$existing_mimes['apk'] = 'application/vnd.android.package-archive';
return $existing_mimes;
}

    public function meta_box(){ 
            add_meta_box(
                'Photo-Gallery',
                __( 'Upload Your Images' ),
                array($this,'meta_box_data'),
                'photogallery',
                'normal',
                'default'
                );
    }
    public function meta_box_data($post){ ?>

<?php
$data=get_post_meta(get_the_ID(), 'wesoftpress',true ); 
$data = !empty($data)? $data : [];
?>

<div class="box" style="width:100%;">
    <h3 class="table_head"><span class="ez-toc-section" id="primary-information"></span>Secondary Paragraph</h3>
    <textarea style="width:100%;" id="Paragraph"
        name="wesoftpress[Paragraph][]"><?php echo isset($data['Paragraph'])? esc_attr($data['Paragraph'][0]):'';?></textarea>

    <h3 class="table_head"><span class="ez-toc-section" id="primary-information"></span>Upload Your Images</h3>
    <table class="link_table">
        <thead class="_table">
            <tr>
                <td>Silde Img</td>
                <td style="padding:0 15px;">Side Title</td>
                <td>Side Text</td>
                <td>&nbsp;</td>
            </tr>
        </thead>
        <tbody>
            <?php
        
        if(isset($data['slide_img_link']) && count($data['slide_img_link']) > 0){
        $i=0;
         
        foreach($data['slide_img_link'] as $links){
            $url = $links;
            $size = isset($data['pic_title'][$i])? $data['pic_title'][$i]:'';
            ?>
            <tr>
                <td style="display: flex; align-items: center;">
                    <input name="wesoftpress[slide_img_link][]" type="text" placeholder="Image Url"
                        class="form-control input-md" value="<?=esc_attr($url);?>" required=""> <a href="#"
                        class="add-apk">Upload</a>
                </td>
                <td style="padding:0 5px; width:100%;">
                    <textarea style="width:100%;" id="w3review"
                        name="wesoftpress[pic_title][]"><?=esc_attr($size);?></textarea>
                </td>
                <td style="display:flex;">
                    <a href="#" class="btn btn-sm btn-success add-row">+</a>
                    <a href="#" class="btn btn-sm btn-danger remove-row">-</a>
                </td>
            </tr>

            <?php
            $i++;
        }
            
        }else{
        ?> <tr>
                <td style="display: flex; align-items: center;">
                    <input name="wesoftpress[slide_img_link][]" type="text" placeholder="Image Url"
                        class="form-control input-md" value="" required=""> <a href="#" class="add-apk">Upload</a>
                </td>
                <td style="padding:0 5px; width:100%;">
                    <textarea style="width:100%;" id="w3review"
                        name="wesoftpress[pic_title][]"><?=esc_attr($size);?></textarea>
                </td>
                <td style="display:flex;">
                    <a href="#" class="btn btn-sm btn-success add-row">+</a>
                    <a href="#" class="btn btn-sm btn-danger remove-row">-</a>
                </td>
            </tr>
            <?php }?>

        </tbody>
    </table>
</div>



<script>
    jQuery(function ($) {
        $('table').on('click', 'a.add-row', function (event) {
            event.preventDefault();
            var tr = $(this).closest('tr');
            var clone = tr.clone(false, false);
            clone.find('input[type="text"]').val('');
            clone.find('textarea').val('');
            clone.find('input[type="checkbox"]').prop('checked', false);

            clone.insertAfter(tr);
        });

        $('table').on('click', 'a.form-add-row', function (event) {
            event.preventDefault();

            var tr = $(this).closest('tr');
            var clone = tr.clone(false, false);
            var order = $(this).closest('table').find('tbody > tr').length + 1;
            clone.find('input, select, textarea').each(function (index, el) {
                this.name = el.name.replace(/\[(.+?)\]/g, "[" + order + "]");
            });
            clone.find('input[type="text"], textarea, select').val('');
            clone.insertAfter(tr);
        });

        $('table').on('click', 'a.remove-row', function (event) {
            event.preventDefault();
            var table = $(this).closest('table');
            //if ( table.find('tbody tr').length > 1 ) {
            $(this).closest('tr').remove();
            //}
        });

        $('table').on('click', 'a.add-apk', function (event) {
            var size = $(this).closest('tr').find('.size');

            var input_link2 = $(this).parent().find('input');

            items_frame = wp.media.frames.items = wp.media({
                title: 'SELECT Album Art',
                button: {
                    text: 'Select'
                },
                multiple: false,
                library: {
                    type: ['application/vnd.android.package-archive']
                },
            });
            items_frame.on('select', function () {
                attachment = items_frame.state().get('selection').first().toJSON();
                console.log(attachment);
                var all = JSON.stringify(attachment);
                var id = attachment.id;
                var url = attachment.url;
                var sizex = attachment.filesizeHumanReadable;
                size.val(sizex);
                var artist = attachment.meta.artist;
                var album = attachment.meta.album;
                var icon = attachment.icon;
                //  $('#src_src_pic').attr('src',url);  
                input_link2.val(url);
            });
            items_frame.open();
            return false;
        });



    });
</script>

<style type="text/css" id="wp-custom-css">
    #Paragraph {
        margin-top: 20px;
    }

    .add-row {
        background: green;
        padding: 10px;
        color: white;
        text-decoration: none;
        margin: 2px;

    }

    .remove-row {
        background: red;
        padding: 10px;
        color: white;
        text-decoration: none;
        margin: 2px;

    }

    .table_head {
        background: #ebe9eb;
        padding: 10px 3px 10px 5px;
        margin-bottom: 0px !important;
        font-size: 19px;
    }

    ._table tr th {

        width: 24%;
        font-weight: normal;
        float: none !important;
        vertical-align: middle;
        font-size: 15px;
        text-align: left;
    }

    ._table tr {
        margin-bottom: 0px;
        border-bottom: 1px solid #ccc;
        float: none !important;
        border: 1px solid #d8d0d0
    }

    ._table tr td {
        white-space: nowrap;
        float: none !important;
        padding: 10px 5px 5px 5px;
        font-size: 14px;
    }

    ._table {
        width: 100%;
    }
</style>
<?php
    }
    public function save($post_id){
            if(get_post_type($post_id)!='photogallery') return;
			//Check it's not an auto save routine
			if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
				return;
				//Perform permission checks! For example:
			if ( !current_user_can('edit_post', $post_id) ) 
			 return;
			 //revision
			if ( wp_is_post_revision( $post_id ) ) {
				return;
			}  
			//If calling wp_update_post, unhook this function so it doesn't loop infinitely
			remove_action('save_post',  array($this,'save')); 
			if(isset($_POST['wesoftpress']) && is_array($_POST['wesoftpress'])){
			   // if(isset($_POST['wesoftpress']['data']['sprice'])){ }
			    update_post_meta($post_id,'wesoftpress',$_POST['wesoftpress']);
			}
			add_action('save_post',  array($this,'save'));}
}
new picPosts();