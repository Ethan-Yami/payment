<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>create project'site</title>
    <style type="text/css">
        #wizard {border:5px solid #789;font-size:12px;height:508px;margin:10px auto;width:580px;overflow:hidden;position:relative;-moz-border-radius:5px;-webkit-border-radius:5px;}
        #wizard .items{width:20000px; clear:both; position:absolute;}
        #wizard .right{float:right;}
        #wizard #status{height:35px;background:#123;padding-left:25px !important;}
        #status {list-style: none;}
        #status li{float:left;color:#fff;padding:10px 60px;}
        #status li.active{background-color:#369;font-weight:normal;}
        .input{width:240px; height:18px; margin:10px auto; line-height:20px; border:1px solid #d3d3d3; padding:2px}
        .page{padding:20px 30px;width:500px;float:left;}
        .page h3{height:42px; font-size:16px; border-bottom:1px dotted #ccc; margin-bottom:20px; padding-bottom:5px}
        .page h3 em{font-size:12px; font-weight:500; font-style:normal}
        .page p{line-height:24px;}
        .page p label{font-size:14px; display:block;}

    </style>

    <script src="//cdn.bootcss.com/jquery/2.0.1/jquery.min.js"></script>
    <script type="text/javascript" src="/Public/js/scrollable.js"></script>
</head>

<body style="overflow: hidden;">


<div id="main">

    <form action="#" method="post">
        <div id="wizard">
            <ul id="status">
                <li class="active"><strong>1.</strong>{{step1}}</li>
                <li><strong>2.</strong>{{step2}}</li>             
                <li><strong>4.</strong>{{step4}}</li>
            </ul>

            <div class="items">
                <div class="page">
                    <h3>{{step1_title}}</h3>
                    
                    <p>
                        <label>{{store_type}}：</label>
                        <input type="radio" class="brand-type" value="1" checked="checked" name="data[store_type]">{{store_restaurant}}
                        <input type="radio" class="brand-type" value="2" name="data[store_type]">{{store_coffeebar}}    
                        <input type="radio" class="brand-type" value="3" name="data[store_type]">{{store_bubbletea}}                     
                    </p>
                    
                    <p>
                        <label>{{store}}：</label>
                        <input type="text" class="brand-type" value="3" name="data[store_name]"/>
                    </p>

                    <p>
                        <label>{{store_contact}}：</label>
                        <input type="text" class="input" id="store_contact" name="data[store_contact]" placeholder="" value=""/>
                    </p>
                   

                    <p>
                        <label>{{store_address}}：</label>
                        <input type="text" class="input" id="store_address" name="data[store_address]"/></p>
                    <div class="btn_nav">
                        <input type="button" class="next right" value="{{next}}&raquo;" />
                    </div>
                </div>
                <div class="page">
                    <h3>{{step2_title}}</h3>
                    <p>
                        <label id='user-text'>{{store_user}}:</label>
                        <input type="text" class="input" id="user" name="user[account]" placeholder=""  />
                    </p>
                    <p>
                        <label id='pass-text'>{{store_pass}}:</label>
                        <input type="password" id="pass" class="input" name="user[password]"  placeholder=""/>
                    </p>
                    <p>
                        <label>{{store_confirm}}：</label>
                        <input type="password" id="pass1" class="input" name="user[confirm]" placeholder=""/>
                    </p>

                    <div class="btn_nav">
                        <input type="button" class="prev" style="float:left" value="&laquo;{{previous}}" />
                        <input type="button" class="next right" value="{{next}}&raquo;" />                 
                    </div>
                </div>
              
                <div class="page">
                    <h3>{{success_title}}<br/><em>{{success_sub_title}}</em></h3>
                    <h4>{{congratulations}}</h4>
                  

                    <div id="ubnt-down">                        
                        <p>{{ubiquiti_tutorials}}</p>                     
                        <br/>
                        <br/>
                        <br/>
                        <div class="btn_nav">
                          <!--   <input type="hidden" id="download" value="">          -->                  
                            <input type="button" onclick="tutorial('https://www.cloudshotspot.com/blog/configure-unifi-controller.html')" value="{{tutorial_unifi}}"/>        
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </form><br />
    <br />
    <br />

</div>

<script type="text/javascript">
    $(function(){
        $("#wizard").scrollable({
            onSeek: function(event,i){
                $("#status li").removeClass("active").eq(i).addClass("active");
            },
            onBeforeSeek:function(event,i){
                if(i==1){
                    let user = $("#branch").val();
                    if(user==""){
                        alert("节点名不能为空！");
                        $("#branch").focus();
                        return false;
                    }
                    let ip = $("#ip").val();
                    let url = $("#url").val();
                    if(ip==""){
                        alert("ip地址不能为空！");
                        return false;
                    }
                    if(url==''){
                        alert("URL不能为空！");
                        return false;
                    }
                }

                if(i==2){
                    let user = $("#user").val();
                    if(user==""){
                        alert("请输入用户名！");
                        return false;
                    }
                    let pass = $("#pass").val();
                    let pass1 = $("#pass1").val();
                    if(pass==""){
                        alert("请输入密码！");
                        return false;
                    }
                    if(pass1 != pass){
                        alert("两次密码不一致！");
                        return false;
                    }


                    postCreatData();



                }
            }
        });
        

      
    });

    function postCreatData(){


        var data = $("form").serialize();

        $.ajax({
            url: "?",
            type: 'POST',
            dataType: 'json',
            data: data,
        })
        .done(function(ret) {
            if(ret.status=='success'){
                explode(ret.data);
                $("#download").val(ret.id);
                $("#success").click();
            }else if(ret.status=='false'){
                alert(ret.message);
            }
        });
    }

    function explode(config){
      var data = "<div class=\"col-md-3 col-sm-4 col-xs-6\"><div class=\"col-xs-12 choise_css\"><div class=\"panel text-center\"><div class=\"panel-body\"><i class=\"fa fa-dropbox fa-5x\" onclick=\"window.open('/hotspot/index?accesskey="+config['salt']+"','_blank')\"></i><h4>"+config['branch']+"</h4><span>"+config['overdue']+"</span></div></div></div></div>";
      parent.$('.container-fluid').append(data)
    } 
    function downloads(){

        var id  = $("#download").val();
        $('body').append("<iframe style='display:none;' src='/hotspot/downtest?id="+id+"'></iframe>" );

    }

    function tutorial(url){
       window.open(url,"_blank");
    }
</script>


</body>
</html>
