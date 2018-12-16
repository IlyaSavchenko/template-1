<div class="comments col-12 col-lg-8">
  <span class="h3">Обсуждения</span>
  <?php if (comments_open()) { ?>
    <?php if (get_comments_number() == 0) { ?>
    <ul class="list">
      <li>Комментариев пока нет. Ваш комментарий сможет стать первым.</li>
    </ul>
    <?php } else { ?>
    <ol class="commentlist">
      <?php
        function verstaka_comment($comment, $args, $depth){
          $GLOBALS['comment'] = $comment; ?>
      <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <div id="comment-<?php comment_ID(); ?>">
          <div class="comment-author vcard">
      		<?php echo get_avatar($comment); ?>
          <?php printf(__('<cite class="fn">%s</cite> <span class="says"></span>'), get_comment_author_link()) ?>
          </div>
          <?php if ($comment->comment_approved == '0') : ?>
          <em><?php _e('Ваш комментарий ожидает модерации.') ?></em>
          <br>
          <?php endif; ?>
          <?php comment_text() ?>
          <div class="reply">
            <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
          </div>
        </div>
        <?php }
          $args = array(
            'reply_text' => 'Ответить',
            'callback' => 'verstaka_comment'
          );
          wp_list_comments($args);
        ?>
    </li>
  </ol>
  <?php } ?>
   
  <?php
    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $fields = array(
      'author' => '<p class="comment-form-author"><input type="text" id="author" name="author" class="author" value="' . esc_attr($commenter['comment_author']) . '" placeholder="*Ваше имя" pattern="[A-Za-zА-Яа-я]{3,}" maxlength="30" autocomplete="on" tabindex="1" required' . $aria_req . '></p>',
      'email' => '<p class="comment-form-email"><input type="email" id="email" name="email" class="email" value="' . esc_attr($commenter['comment_author_email']) . '" placeholder="*Контактный e-mail" maxlength="30" autocomplete="on" tabindex="2" required' . $aria_req . '></p>'    );
 
    $args = array(
      'title_reply'=>'',
      'comment_notes_after' => '',
      'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" class="comment-form"  rows="8" aria-required="true" placeholder="*Текст комментария"></textarea></p>',
        'submit_button' => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s"/>',      
	  'label_submit' => 'Отправить',
      'fields' => $fields
    );
    comment_form($args);
  ?>
  <?php } else { ?>
  <p>Обсуждения закрыты для данной страницы</p>
  <?php } ?>
  <p class="comment-notes ">Нажимая на кнопку «Отправить», вы даете согласие на обработку своих персональных данных.</p>	
</div>

<!-- cols="45" -->