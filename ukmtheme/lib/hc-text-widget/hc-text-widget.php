<?php
/*
Plugin Name: HC Text Widget
Version: 1.0
Plugin URI: http://wordpress.org/plugins/hc-text-widget/
Description: WYSIWYG editor inside a widget
Author: Some Web Media
Author URI: http://someweblog.com/
*/


if (!class_exists('HC_Text_Widget')) {

	// Include widget
	add_action('widgets_init', 'hc_text_widget');
	function hc_text_widget(){
		register_widget('HC_Text_Widget');
	}

	class HC_Text_Widget extends WP_Widget {

		public function __construct() {
			// Instantiate the parent object
			parent::__construct(
				'hc_text', // Base ID
				'WYSIWYG', // Name
				array('description' => 'Arbitrary text or HTML with visual editor'), // Args
				array('width' => 600, 'height' => 550)
			);
		}

		public function widget($args, $instance) {
			extract($args);

			if (!$instance['title'] && !$instance['text']) return;

			$title = apply_filters('widget_title', $instance['title']);
			$text = apply_filters('widget_text', $instance['text'], $instance);

			echo $before_widget; ?>

				<?php if ($title) : ?><h3><?php echo $title; ?></h3><?php endif; ?>
				<?php if ($text) : ?><div class="textwidget"><?php echo $text; ?></div><?php endif; ?>

			<?php echo $after_widget;
		}

		public function form($instance) {
			$instance = wp_parse_args((array)$instance, array('title' => '', 'text' => ''));

			$editor_id = $this->get_field_id('text');
			?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>">
			</p>

			<div id="wp-<?php echo $editor_id; ?>-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
				<?php wp_print_styles('editor-buttons'); ?>
				<div id="wp-<?php echo $editor_id; ?>-editor-tools" class="wp-editor-tools hide-if-no-js">
					<a id="<?php echo $editor_id; ?>-html" class="wp-switch-editor switch-html" onclick="switchEditors.switchto(this);" hidefocus="true" style="outline: none;">Text</a>
					<a id="<?php echo $editor_id; ?>-tmce" class="wp-switch-editor switch-tmce" onclick="switchEditors.switchto(this);" hidefocus="true" style="outline: none;">Visual</a>
					<div id="wp-<?php echo $editor_id; ?>-media-buttons" class="wp-media-buttons">
						<?php do_action('media_buttons', $editor_id); ?>
					</div>
				</div>
				<?php
				$the_editor = apply_filters('the_editor', '<div id="wp-' . $editor_id . '-editor-container" class="wp-editor-container"><textarea class="wp-editor-area hc_text_widget_tinymce widefat" rows="15" cols="40" name="' . $this->get_field_name('text') . '" id="' . $editor_id . '">%s</textarea></div>');
				$content = apply_filters('the_editor_content', $instance['text']);
				printf($the_editor, $content);
				?>
			</div>

			<div class="tinymce-dummy" style="display:none">
				<?php wp_editor('', $this->get_field_id('text').'-dummy', array(
					'textarea_name' => 'tinymce-dummy',
					'media_buttons' => true
				)); ?>
			</div>
		<?php
		}

		public function update($new_instance, $old_instance) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['text'] = $new_instance['text'];
			return $instance;
		}
	}

	// Include footer scripts
	add_action('admin_print_footer_scripts', 'hc_tinymce_footer_scripts');
	function hc_tinymce_footer_scripts() {
		?>
		<style>.mceIframeContainer {background: #fff;}</style>
		<script>
		(function($){

			// parse $_GET params from url
			function getQueryParams(qs) {
				qs = qs.split("+").join(" ");
				var params = {},
					tokens,
					re = /[?&]?([^=]+)=([^&]*)/g;
				while (tokens = re.exec(qs)) {
					params[decodeURIComponent(tokens[1])] = decodeURIComponent(tokens[2]);
				}
				return params;
			}

			function hc_tinymce_init(widget_id) {

				// remove editor if already exist
				tinyMCE.execCommand("mceRemoveControl", false, widget_id);

				var dummy = 'widget-hc_text-__i__-text-dummy';

				var tinyMCENewInit = tinyMCEPreInit;

				var mceInit = jQuery.extend(true, {}, tinyMCEPreInit['mceInit'][dummy]),
					qtInit = jQuery.extend(true, {}, tinyMCEPreInit['qtInit'][dummy]);

				tinyMCENewInit['mceInit'] = {};
				tinyMCENewInit['mceInit'][widget_id] = mceInit;
				tinyMCEPreInit['mceInit'][dummy] = mceInit;
				tinyMCENewInit['mceInit'][widget_id]['elements'] = widget_id;

				tinyMCENewInit['qtInit'] = {};
				tinyMCENewInit['qtInit'][widget_id] = qtInit;
				tinyMCENewInit['qtInit'][dummy] = qtInit;
				tinyMCENewInit['qtInit'][widget_id]['id'] = widget_id;

				(function(){
					var ed, qt, DOM, el, i, mce = 0;

					var editorEvent = function(ed) {
						$('#' + ed.id).val(tinyMCE.get(ed.id).getContent());
					}

					if (typeof(tinymce) == 'object') {
						DOM = tinymce.DOM;
						// mark wp_theme/ui.css as loaded
						DOM.files[tinymce.baseURI.getURI() + '/themes/advanced/skins/wp_theme/ui.css'] = true;

						DOM.events.add( DOM.select('.wp-editor-wrap'), 'mousedown', function(e){
							if ( this.id )
								wpActiveEditor = this.id.slice(3, -5);
						});

						for ( ed in tinyMCENewInit.mceInit ) {

							if (ed == dummy) continue;

							tinyMCENewInit.mceInit[ed]['setup'] = function(ed) {
								ed.onKeyUp.add(editorEvent);
								ed.onExecCommand.add(editorEvent);
							}

							if ( mce )
								try { tinymce.init( tinyMCENewInit.mceInit[ed] ) } catch(e){}
						}
					} else {
						if ( tinyMCENewInit.qtInit ) {
							for ( i in tinyMCENewInit.qtInit ) {
								el = tinyMCENewInit.qtInit[i].id;
								if ( el )
									document.getElementById('wp-'+el+'-wrap').onmousedown = function(){ wpActiveEditor = this.id.slice(3, -5) }
							}
						}
					}

					if ( typeof(QTags) == 'function' ) {

						for ( qt in tinyMCENewInit.qtInit ) {

							if (qt == dummy) continue;

							try { quicktags( tinyMCENewInit.qtInit[qt] ) } catch(e){}

							// init buttons
							QTags._buttonsInit();

							$('#' + qt + '-tmce').click();
						}
					}

				})();
			}

			$(document).ready(function(){
				$('.hc_text_widget_tinymce').each(function(){
					var id = $(this).attr('id');
					if (/__i__/.test(id) === false) {
						hc_tinymce_init(id);
					}
				});
			});

			// on every ajax call (example on new widget added)
			$(document).ajaxSuccess(function(evt, request, settings) {
				if (!settings.data) return;
				var $_GET = getQueryParams(settings.data);
				if ($_GET['widget-id'] && !$_GET['delete_widget']) {
					var widget_id = 'widget-' + $_GET['widget-id'] + '-text';
					hc_tinymce_init(widget_id);
				}
			});

		})(jQuery);
		</script>
		<?php
	}

}

?>