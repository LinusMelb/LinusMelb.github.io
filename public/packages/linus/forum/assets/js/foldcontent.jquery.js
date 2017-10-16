jQuery(document).ready(function() {
    
    "use strict";

    //定义 foldcontent_jquery 的构造函数
    var foldcontent_jquery = function (ele,opt) {
        this.$element = ele;
        this.defaults = {
            'btnBg': '#eff6fa',
            'btnColor': '#0c5897',
            'fixBtnBg': '#81baeb',
            'fixBtnColor': '#fff',
            'fontSize': '12px',
            'padding': '5px',
            'initialText': '展开',
            'fixText': '收起',
            'bottom': '10px',
            'right': '20px',
            'lineHeight': '1'
        };
        this.options = $.extend({}, this.defaults, opt)
    };

    // 定义方法
    foldcontent_jquery.prototype = {
        config: function () {
            this.$element.text(this.options.initialText);
            this.$element.css({
                'color': this.options.btnColor,
                'fontSize': this.options.fontSize,
                'background': this.options.btnBg,
                'position': 'fixed',
                'borderRadius': '5px',
                'padding':  this.options.padding,
                'bottom': this.options.bottom,
                'right': this.options.right,
                'lineHeight': this.options.lineHeight,
                'text': this.options.initialText
            });
            return this;
        },

        /* fold and unfold post item */
        mainFunction: function(){

            var win = $(window);

            /* determine which post item needs to show bottom bar */
            function checkInView(elem){
                var container = $(elem);

                var containerHeight = container.height();


                var scrollTop     = win.scrollTop(),
                elementOffset = container.offset().top,
                distance      = (elementOffset - scrollTop);

                var dis2 = (scrollTop + win.height() - elementOffset - containerHeight);

                /* Check cuurent post */
                var dis3 = win.height() + scrollTop - elementOffset;

                if(dis2 < 0 && dis3 > 0){
                    return ['s', container];
                }

                return ['f', dis2];

            }/* End of checkInView function */


            /* Click events for 'show all' button */
            function clickEvents(){
                $('.post button').on('click', function(){

                if($(this).hasClass( "selected" )){
                    $(this).removeClass("selected");
                    $(this).parent().parent().parent().removeClass('triggered');

                }else{

                    $(this).addClass("selected");

                    $(this).parent().parent().parent().addClass('triggered');
                }

            });
            
            }/* End of clickEvents function */

            /* 展开 */
            var unfoldText = this.options.initialText;
            /* 收起 */
            var foldText = this.options.fixText;

            clickEvents();

            /* JS will execute this code first */
            /* This block can call functions above */
            var bar = this.$element;
            console.log(bar);
            // bar.css('display', 'none');
            /* Call click events */

            win.scroll(function(){

               var result="";
               $.each( $(".triggered"),function(i,e){
                    if(result[0] != 's'){
                        result = checkInView($(e));
                    }
                });
                console.log(result);

                if(result[0] == 's'){

                    bar.css( "display", "inline" );
                    bar.text(foldText);
                    bar.attr('data-target', '#'+result[1].attr('post-id'));

                }else{
                    bar.css("display", "none");
                }

            });

        }
    }

    //在插件中使用 foldcontent_jquery 对象
    $.fn.foldContentPlugin = function (options) {
        
        console.log('asdasd0');

        //创建 FoldContent 的实体
        var foldcontent_j = new foldcontent_jquery(this, options);


        //调用其方法
        foldcontent_j.config();


        foldcontent_j.mainFunction();


    }


});