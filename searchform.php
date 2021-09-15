<form role="search" method="get" id="searchform" class="search-form" action="<?php echo home_url( '/' ); ?>">

    <div class="row">
        <div class="col-10">
            <div class="form-floating">
                <input type="search" class="form-control shadow-5" placeholder="Search" value="<?php echo get_search_query() ?>" name="s" title="Search" style="border-radius:30px;"/>
                <label for="s" class="secondary-text"> <i class="fas fa-search"></i> <?php pll_e('Buscar'); ?></label>
                <input type="hidden" name="post_type[]" value="developments"/>
                <input type="hidden" name="post_type[]" value="listings"/>
                <input type="hidden" name="post_type[]" value="rentals"/>
            </div>
        </div>

        <div class="col-2">
            <button class="btn btn-search" type="submit" id="searchsubmit" value=""><i class="fas fa-search"></i></button>
        </div>

    </div>
</form>