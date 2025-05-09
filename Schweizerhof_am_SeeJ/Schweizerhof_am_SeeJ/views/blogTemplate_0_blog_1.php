<?php
                                        $countItems = 3;
                                        $templateOrder  = $itemIndex % $countItems;
                                        ?><?php if ($templateOrder == 0) : ?><!--blog_post-->
        <div class="u-blog-post u-container-style u-repeater-item">
          <div class="u-container-layout u-similar-container u-valign-bottom-lg u-container-layout-1"><!--blog_post_image-->
            <?php if ($image0) : ?><a class="u-blog-control u-image u-image-default u-image-1" href="<?php $link = $titleLink0 ? $titleLink0 : $readmoreLink0; if($link): echo $link; endif; ?>"><img alt="<?php echo $altImage0; ?>" class="u-blog-control u-image u-image-default u-image-1" src="<?php echo $image0; ?>"></a><?php else: ?><div class="none-post-image" style="display: none;"></div><?php endif; ?><!--/blog_post_image-->
            <div class="u-container-style u-group u-video-cover u-white u-group-1">
              <div class="u-container-layout u-valign-middle-sm u-valign-middle-xs u-valign-top-md u-container-layout-2"><!--blog_post_header-->
                <?php if ($title0): ?><h4 class="u-blog-control u-text u-text-2">
                  <?php if ($titleLink0): ?><a class="u-post-header-link" href="<?php echo $titleLink0; ?>"><?php endif; ?><?php echo $title0; ?><?php if ($titleLink0): ?></a><?php endif; ?>
                </h4><?php endif; ?><!--/blog_post_header--><!--blog_post_content-->
                <div class="u-blog-control u-post-content u-text u-text-3"><?php echo $content0; ?></div><!--/blog_post_content--><!--blog_post_readmore-->
                <?php if ($readmoreLink0): ?><a href="<?php echo $readmoreLink0; ?>" class="u-blog-control u-btn u-button-style u-btn-1"><!--blog_post_readmore_content--><!--options_json--><!--{"content":"Read More","defaultValue":"Mehr erfahren"}--><!--/options_json-->Read More<!--/blog_post_readmore_content--></a><?php endif; ?><!--/blog_post_readmore-->
              </div>
            </div>
          </div>
        </div><!--/blog_post--><?php endif; ?><?php if ($templateOrder == 1) : ?><!--blog_post-->
        <div class="u-blog-post u-container-style u-repeater-item">
          <div class="u-container-layout u-similar-container u-valign-bottom-lg u-container-layout-3"><!--blog_post_image-->
            <?php if ($image0) : ?><a class="u-blog-control u-image u-image-default u-image-2" href="<?php $link = $titleLink0 ? $titleLink0 : $readmoreLink0; if($link): echo $link; endif; ?>"><img alt="<?php echo $altImage0; ?>" class="u-blog-control u-image u-image-default u-image-2" src="<?php echo $image0; ?>"></a><?php else: ?><div class="none-post-image" style="display: none;"></div><?php endif; ?><!--/blog_post_image-->
            <div class="u-container-style u-group u-video-cover u-white u-group-2">
              <div class="u-container-layout u-valign-middle-sm u-valign-middle-xs u-valign-top-md u-container-layout-4"><!--blog_post_header-->
                <?php if ($title0): ?><h4 class="u-blog-control u-text u-text-4">
                  <?php if ($titleLink0): ?><a class="u-post-header-link" href="<?php echo $titleLink0; ?>"><?php endif; ?><?php echo $title0; ?><?php if ($titleLink0): ?></a><?php endif; ?>
                </h4><?php endif; ?><!--/blog_post_header--><!--blog_post_content-->
                <div class="u-blog-control u-post-content u-text u-text-5"><?php echo $content0; ?></div><!--/blog_post_content--><!--blog_post_readmore-->
                <?php if ($readmoreLink0): ?><a href="<?php echo $readmoreLink0; ?>" class="u-blog-control u-btn u-button-style u-btn-2"><!--blog_post_readmore_content--><!--options_json--><!--{"content":"Read More","defaultValue":"Mehr erfahren"}--><!--/options_json-->Read More<!--/blog_post_readmore_content--></a><?php endif; ?><!--/blog_post_readmore-->
              </div>
            </div>
          </div>
        </div><!--/blog_post--><?php endif; ?><?php if ($templateOrder == 2) : ?><!--blog_post-->
        <div class="u-blog-post u-container-style u-repeater-item u-video-cover u-repeater-item-3">
          <div class="u-container-layout u-similar-container u-valign-bottom-lg u-container-layout-5"><!--blog_post_image-->
            <?php if ($image0) : ?><a class="u-blog-control u-image u-image-default u-image-3" href="<?php $link = $titleLink0 ? $titleLink0 : $readmoreLink0; if($link): echo $link; endif; ?>"><img alt="<?php echo $altImage0; ?>" class="u-blog-control u-image u-image-default u-image-3" src="<?php echo $image0; ?>"></a><?php else: ?><div class="none-post-image" style="display: none;"></div><?php endif; ?><!--/blog_post_image-->
            <div class="u-container-style u-group u-white u-group-3">
              <div class="u-container-layout u-valign-middle-sm u-valign-middle-xs u-valign-top-md u-container-layout-6"><!--blog_post_header-->
                <?php if ($title0): ?><h4 class="u-blog-control u-text u-text-6">
                  <?php if ($titleLink0): ?><a class="u-post-header-link" href="<?php echo $titleLink0; ?>"><?php endif; ?><?php echo $title0; ?><?php if ($titleLink0): ?></a><?php endif; ?>
                </h4><?php endif; ?><!--/blog_post_header--><!--blog_post_content-->
                <div class="u-blog-control u-post-content u-text u-text-7"><?php echo $content0; ?></div><!--/blog_post_content--><!--blog_post_readmore-->
                <?php if ($readmoreLink0): ?><a href="<?php echo $readmoreLink0; ?>" class="u-blog-control u-btn u-button-style u-text-1"><!--blog_post_readmore_content--><!--options_json--><!--{"content":"Read More","defaultValue":"Mehr erfahren"}--><!--/options_json-->Read More<!--/blog_post_readmore_content--></a><?php endif; ?><!--/blog_post_readmore-->
              </div>
            </div>
          </div>
        </div><!--/blog_post--><?php endif; ?>