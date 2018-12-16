<div class="col-12 col-lg-4 sidebar">
    <div class="container">
        <?php get_search_form(); ?>
        <div id="exTab2" class="tab-container">	
            <ul class="nav nav-tabs row">     <!--https://codepen.io/wizly/pen/BlKxo -->
                <li class="panel1 active col-6">
                    <a href="#t1" data-toggle="tab" class="tab tab-panel1"><i class="far fa-star"></i> Популярные </a>
                </li>
                <li class="panel2 col-6">    
                    <a  href="#t2" data-toggle="tab" class="tab tab-panel2"><i class="far fa-file"></i> Новые</a>
                </li>
            </ul>
        
            <div class="tab-content ">
                <div id="t1"  class="tab-pane tab-active"></div>
                <div id="t2"  class="tab-pane">Ожидайте...</div>
            </div>
        </div>
    </div>
</div>  