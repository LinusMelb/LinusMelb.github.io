jQuery(document).ready(function() {

    "use strict";

    //定义 foldcontent_jquery 的构造函数
    var foldcontent_jquery = function (ele,opt) {
        this.$element = ele;
        this.defaults = {
            // 'btnBg': '#eff6fa',
            'btnBg': 'white',
            'btnColor': 'rgb(133, 144, 166)!important',
            'fixBtnBg': '#81baeb',
            'fixBtnColor': '#fff',
            'fontSize': '17px',
            'padding': '15px',
            'initialText': '展开',
            'fixText': '收起',
            'bottom': '0px',
            'lineHeight': '1',
            'height': ''

        };
        this.options = $.extend({}, this.defaults, opt)
    };

    // 定义方法
    foldcontent_jquery.prototype = {
        config: function () {
            // this.$element.text(this.options.initialText);
            this.$element.css({
                'color': this.options.btnColor,
                'fontSize': this.options.fontSize,
                'background': this.options.btnBg,
                'position': 'fixed',
                'borderRadius': '5px',
                'padding':  this.options.padding,
                'bottom': this.options.bottom,
                'lineHeight': this.options.lineHeight,
                'height': this.options.height,
                'width': $('.post').css('width'),
                '-webkit-box-shadow': 'rgba(0, 34, 77, 0.05) 0px -3px 10px',
                'box-shadow': 'rgba(0, 34, 77, 0.05) 0px -3px 10px',
                'transition': 'transform 0.2s ease-out'
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

                /* Check current post */
                var dis3 = win.height() + scrollTop - elementOffset;

                if(dis2 < 0 && dis3 > 0){
                    return ['s', container];
                }

                return ['f', dis2];

            }/* End of checkInView function */


            /* Click events for 'show all' button */
            function clickEvents(){
                $('.post .toggle').on('click', function(){

                    if($(this).children().text() == '展开'){
                        $(this).parent().parent().parent().parent().addClass('triggered');
                        $(this).children().text('收起');
                    }else{
                        $(this).parent().parent().parent().parent().removeClass('triggered');
                        $(this).children().text('展开');
                    }


                });

                $('#btmBar .fold').on('click', function(){

                    var id = $(this).attr('data-target');

                    /* Get id of this post */
                    id = id.match(/\d+/);

                    /* Remove triggered flag from this post */
                    $( '#post-'+id[0] ).removeClass('triggered');

                    /* Display 'show all' button */
                    $('#post-'+id[0]).children().children('.posttext').children('h2').children('.toggle').children().text('展开');

                    $(this).parent().hide();

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
            var btn1 = bar.children("a:first");
            /* Call click events */

            win.scroll(function(){

               var result="";
               $.each( $(".triggered"),function(i,e){
                    if(result[0] != 's'){
                        result = checkInView($(e));
                    }
                });

                if(result[0] == 's'){
                    bar.fadeIn(300);

                    var dd = result[1].attr('id').match(/\d+/);

                    btn1.attr('data-target', '#'+dd[0]);
                    btn1.attr('href', '#fix-'+dd[0]);
                    bar.css('width', result[1].css('width'));

                }else{
                    // bar.css("display", "none");
                    bar.fadeOut(300);
                }

            });

        }
    }

    //在插件中使用 foldcontent_jquery 对象
    $.fn.foldContentPlugin = function (options) {

        //创建 FoldContent 的实体
        var foldcontent_j = new foldcontent_jquery(this, options);


        //调用其方法
        foldcontent_j.config();


        foldcontent_j.mainFunction();


    }


});
