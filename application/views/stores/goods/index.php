{% extends "/layout/store_boot.html" %}
{% set active_now='goods' %}

{% block head %}
 {{ parent() }}
<style>
    html,body{margin:0px;padding: 0px;}   
    .nav-link{padding-top: 0px;}
    tr,td{margin-top: 0px;}
    .pagination{

        padding-left: 0;
        list-style: none;
           
        text-align: center;
    }
    .page-item{width:48px;height: 40px;text-align: center;line-height: 40px;border-right: 1px solid #ddd;background-color: white;  border-radius: .25rem;    }
</style>

{% endblock %}

{% block nav %}


  <ul class="nav" style="background-color: white; height: 48px;line-height: 48px;">
  <li class="nav-item">
    <a class="nav-link disabled" href="/store/goods/index">全部商品</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/store/goods/category">商品分类</a>
  </li>
 
</ul>


{% endblock %}

{% block content %}

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <a href='/store/goods/create' class="btn btn-info">增加</a>
        <button type="button" class="btn btn-success">导入</button>
        <button type="button" class="btn btn-danger">导出</button>       

      </div>

      <div class="col-md-12"> 

        <table class="table" style="background-color: white;">
              <thead>
                  <tr>
                      <th class="text-center">                        
                          <div class="form-check">
                              <label class="form-check-label">
                                  <input class="form-check-input goods-all" type="checkbox" value="">
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                              </label>
                          </div>

                      </th>
                    
                      <th>名称/编码</th>
                      <th>分类</th>
                      <th>售价</th>
                      <th class="text-center">库存</th>
                      <th class="text-center">操作</th>
                  </tr>
              </thead>
             <tbody id="list-public">

                  <tr v-for="item in items" :id="item.id">
                      <td class="text-center">
                        <div class="form-check">
                              <label class="form-check-label">
                                  <input class="form-check-input goods_check" type="checkbox" value="">
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                              </label>
                          </div>

                      </td>
                      <td>
                        <div class="img-container text-center " style="float: left;">
                            <img :src="item.thumb" style="width: 40px">
                        </div>
                        <div class="td-name text-center" style="float: left;padding-left:8px;">
                          <a href="javascript:void(0);">${ item.name }</a>
                          <br><small>${ item.sn }</small>
                        </div>

                      </td>
                      <td>${item.category_name}</td>
                      <td>${ item.retail_price }</td>
                      <td class="text-center">${ item.quantity}</td>
                      <td class="td-actions text-center">
                          <button type="button" rel="tooltip" :data-id='item.id' class="btn btn-success edit">
                              <i class="material-icons">edit</i>
                          </button>
                          <button type="button" :data-id="item.id" rel="tooltip" class="btn btn-danger del">
                              <i class="material-icons">close</i>
                          </button>
                      </td>
                  </tr>
                  <div>
              
                  </div>
                
              </tbody>
          </table>

           

         
              
              {{page|raw}}
           
      </div>
        
    </div>
  </div>
{% endblock %}


{% block script %}
  <script src="https://cdn.jsdelivr.net/npm/vue"></script>
  <script type="text/javascript">
    $(function(){

      var goods = {{result|json_encode|raw }};
      console.log(goods);
     
      new Vue({
        delimiters: ['${', '}'],
        el: '#list-public',
        data: {
          items: goods
        }
      });
       $('.edit').click(function(event) {
        /* Act on the event */
        var id = $(this).data('id');
        window.location.href="/store/goods/edit/"+id;
      });

      $(".del").click(function(event) {
        /* Act on the event */
          var id = $(this).data('id');
          console.log(id);
          $.ajax({
            url: '/store/goods/del',
            type: 'POST',
            dataType: 'json',
            data: {"id": id},
          })
          .done(function(ret) {
            if(ret.status=='success'){
              $("#"+id).remove();
              console.log(id);
            }
          });  
      });

      $(".goods-all").click(function(event) {
        $(".goods_check").each(function(){
          var flag = $(this).attr('checked');
          console.log(flag);
          if(flag==undefined || flag==''){
            $(this).attr('checked', 'checked');
          }else if(flag=='checked'){
            $(this).removeAttr('checked');
          }
          //var flag = 
        });
      });

    });

    
  </script>
 


{% endblock %}
