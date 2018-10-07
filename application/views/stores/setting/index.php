{% extends "/layout/store_boot.html" %}
{% set active_now='setting' %}


{% block head %}
 {{ parent() }}
<style>
    html,body{margin:0px;padding: 0px;}
    .main-panel>.content{margin-top: 16px;}
    .goods-thumb{/*width: 200px;
    height: 200px;
    border: 1px solid black;*/
    background-color: white;
    position: absolute;
    top: 28px;
    text-align: center;
    left: 96px;}
    #thumb{
      width: 100px;
      height: 100px;     
      border: 1px solid black;                  
    }
    #thumb img{width: 100%;height: 100%;}
   .card .card-body .form-group {
        margin: 16px 0 0;
    }
</style>
 
{% endblock %}

{% block nav %}
<nav aria-label="breadcrumb">
  <ol class="breadcrumb" style="background-color: white;">
    <li class="breadcrumb-item"><a href="/store/goods/index">全部商品</a></li> 
    <li class="breadcrumb-item active" aria-current="page">增加</li>
  </ol>
</nav>
{% endblock %}

{% block content %}

  <div class="container-fluid">
    <div class="row">
      
     
      <div class="card" style="margin-top: 0px;">
        <div class="card-header card-header-info" style="margin:0px;">
          {{lang['step1']}}
        </div>
        <div class="card-body">
          
          <form id="goods-create-form">
            
            
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>{{lang['store']}}</label>
                <input type="text" name="goods[name]" value="{{store['store_name']}}" class="form-control">
              </div>
              
            </div>

            <div class="form-row">
              <div class="form-group col-md-6" >
                
                    <label style="position: relative;top: -20px;">{{lang['store_type']}}</label>
                    <select id="category-public" name="goods[cate_id]" class="form-control" style="margin-top:-28px;padding-top:0px;height:36px;">

                      <option value="1" {% if store['store_type'] == 1 %} selected="selected" {% endif %}>		{{lang['store_restaurant']}}
                      </option>
                      <option value="2" {% if store['store_type'] == 2 %} selected="selected" {% endif %}>
                      	{{lang['store_coffeebar']}}
                  	  </option>
                      <option value="3" {% if store['store_type'] == 3 %} selected="selected"{% endif %}>		{{lang['store_bubbletea']}}
                      </option>                      
                    </select>
              </div>
          
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>{{lang['store_contact']}}</label>
                <input type="text" name="goods[sn]" value="{{store['store_contact']}}" class="form-control">
              </div>              
                     
            </div>


            <div class="form-row">
              <div class="form-group col-md-6">
                <label>{{lang['store_address']}}</label>
                <input type="text" name="goods[thumb]" value="{{store['store_address']}}"  class="form-control" id="fechurl">
              </div>
              
             
            </div>

            <div class="form-row">
              <div class="form-group col-md-2">
                <label for="inputEmail4">零售价</label>
                <input type="text" name="goods[retail_price]" class="form-control">
              </div>
              <div class="form-group col-md-2">
                <label for="inputPassword4">进货价</label>
                <input type="text" name="goods[cost_price]" class="form-control">
              </div>

              <div class="form-group col-md-2">
                <label for="inputPassword4">库存</label>
                <input type="text" name="goods[quantity]" class="form-control">
              </div>
             
            </div>          

                     
            <div class="form-row">
              <div class="form-group col-md-6 text-center">
                 <button type="submit" class="btn btn-success">确认增加</button>
              </div>
                   
            </div>
         
          
          </form>



        </div>
      </div>

    </div>
  </div>
  
      
  <div id="dialog" style="display: none;width: 98%;padding: 30px 60px;">
      <form id="category-form">
        
     
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for='cname'>分类名称</label>
            <input name="data[name]" id="cname" type="text" class="form-control" required="required" />
        </div>              
                 
        </div>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label>分类排序</label>
            <input name="data[index]" value='1' type="text" class="form-control">
          </div>              
                 
        </div>

        <div class="form-row">
          <div class="form-group col-md-12 text-center">
             <button type="submit" class="btn btn-success">确认增加</button>
          </div>           
                 
        </div>
      </form>
  </div>
  

  
{% endblock %}


{% block script %}

<link href="//cdnjs.cloudflare.com/ajax/libs/layer/2.3/skin/layer.css" rel="stylesheet">
<script src="//cdnjs.cloudflare.com/ajax/libs/layer/2.3/layer.js"></script>
<script src="//cdn.jsdelivr.net/npm/jquery-validation@1.14.0/dist/jquery.validate.min.js"></script>

<script type="text/javascript">
  
   $( function() {
      $("#category-create").click(function(event) {
        layer.open({
          type: 1,
          shade: false,
          title: '创建分类', //不显示标题
          area: ['420px', '328px'], //宽高
          content: $( "#dialog" ), //
        });
      });

      $(".thumb-chose").click(function(event) {
        /* Act on the event */
        var ok = Math.random();
        var field = 'thumb';
        var field_value = 'fechurl';
        var url = '/picture/component/init?field='+field+'&field_value='+field_value+'&hash='+ok+'"';
        layer.open({
          type: 2,
          title: "Pictures Library",
          area: ['664px', '560px'],
          fix: false, //不固定
          maxmin: true,
          content: url
        });
      });

    
      $("#goods-create-form").validate({
          rules: {
            'goods[name]': "required",           
            'goods[cate_id]': {
                required: true
              },
            'goods[sn]': {
                required: true
              },  
            'goods[retail_price]': {
                required: true
              }, 
            'goods[quantity]': {
              required: true,
            }, 
            'goods[thumb]':"required",            
          },
          messages: {
            'goods[name]': "请输入商品名称",          
            'goods[cate_id]': {
                required: "请选择分类,无请创建",
              },
            'goods[sn]': {
              required: "请输入商品编码或条形码",
            },
            'goods[retail_price]': {
              required: "请输入商品价格",
            },
            'goods[quantity]': {
              required: "请输入商品库存",
            },    
            'goods[thumb]': {
              required: "请选择商品图片",
            }          
          },
          submitHandler:function(form){
            layer.load(0, {shade: false,time:1000}); //0代表加载的风格，支持0-2

            $.ajax({
              url: '?',
              type: 'POST',
              dataType: 'json',
              data: $("#goods-create-form").serialize(),
            })
            .done(function(ret) {
              console.log(ret);
              if(ret.status=='success'){
                layer.msg('增加完成!', {icon: 6, time: 2000});
                setTimeout(function() {
                  window.location.reload();
                }, 2000);  
                
              }
              console.log("success");
            });
          }    


      });


          $("#category-form").validate({
          rules: {
            'data[name]': "required"           
          },
          messages: {
            'data[name]': "请输入分类名称"          
          },
          submitHandler:function(form){
            layer.load(0, {shade: false,time:1000}); //0代表加载的风格，支持0-2

            $.ajax({
              url: '/store/goods/categoryapi/create',
              type: 'POST',
              dataType: 'json',
              data: $("#category-form").serialize(),
            })
            .done(function(ret) {
              console.log(ret);
              if(ret.status=='success'){
                layer.msg('增加完成!', {icon: 6, time: 2000});  
                var component = "<option value="+ret.data.id+">"+ret.data.name+"</option>";
                $("#category-public").prepend(component);
                $("#cname").val('');
              }
              console.log("success");
            });
          }    


      });


    
    });
</script>


{% endblock %}
