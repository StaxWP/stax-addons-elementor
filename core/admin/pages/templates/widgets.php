<h2 class="ste-my-0 ste-leading-none ste-text-2xl ste-text-gray-700 ste-font-bold ste-tracking-wide">
    <?php _e( 'Widgets', 'stax-addons-for-elementor' ); ?>
</h2>

<div class="ste-mt-5">
    <form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="POST">
        <div class="ste-flex ste-flex-wrap ste--mx-2">
            <?php foreach ( $widgets as $key => $widget ) : ?>
                <div class="ste-my-2 ste-w-full md:ste-w-1/2 lg:ste-w-1/3 xl:ste-w-1/4">
                    <div class="ste-mx-2">
                        <label for="module-label-<?php echo $key ?>"
                               class="ste-flex ste-justify-between ste-items-center ste-border-2 ste-border-solid ste-border-gray-300 ste-rounded ste-bg-gray-100 ste-p-4 hover:ste-border-gray-400">
                            <span class="ste-font-small ste-text-gray-600 ste-text-lg"><?php echo $widget['name'] ?></span>
                            <div class="ste-relative">
                                <input type="checkbox" name="<?php echo esc_attr( $widget['slug'] ) ?>"
                                       id="module-label-<?php echo $key ?>" class="ste-toggle-input" <?php checked( $widget['status'] ) ?>>
                                <div class="ste-toggle-line ste-w-10 ste-h-4 ste-bg-gray-400 ste-rounded-full ste-shadow-inner"></div>
                                <div class="ste-toggle-dot ste-absolute ste-w-6 ste-h-6 ste-bg-white ste-rounded-full ste-shadow ste-inset-y-0 ste-left-0"></div>
                            </div>
                        </label>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <input type="hidden" name="action" value="stax_widget_activation">

        <div class="ste-mt-5">
            <button type="submit"
                    class="ste-bg-green-500 ste-text-md ste-text-white ste-py-2 ste-pl-4 ste-pr-6 ste-rounded ste-border-0 ste-shadow-xl hover:ste-shadow-lg ste-cursor-pointer ste-uppercase">
                <span class="ste-flex ste-items-center">
                    <span class="dashicons dashicons-yes"></span>
	                <span class="ste-leading-normal ste-ml-2"><?php _e( 'Save', 'stax-addons-for-elementor' ); ?></span>
                </span>
            </button>
        </div>
    </form>
</div>
