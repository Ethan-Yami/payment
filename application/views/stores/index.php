{% extends "/layout/store_boot.html" %}


{% block head %}
 {{ parent() }}
<style>
    html,body{margin:0px;padding: 0px;}   
    .nav-link{padding-top: 0px;}
    tr,td{margin-top: 0px;}
    .pagination{
        width: auto;
        min-width: 100px;
        max-width: 280px;   
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        padding-left: 0;
        list-style: none;
        border-radius: .25rem;
        background-color: white;
        text-align: center;
    }
    .page-item{width:48px;height: 40px;text-align: center;line-height: 40px;border-right: 1px solid #ddd; }
</style>

{% endblock %}

{% block nav %}


  <ul class="nav" style="background-color: white; height: 48px;line-height: 48px;">
  <li class="nav-item">
    <a class="nav-link disabled" href="#">全部商品</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">商品分类</a>
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
              <tbody>
                {% for v in result %}
                  <tr id="goods-{{v['id']}}">
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
                            <img src="{{v['thumb']}}" style="width: 40px">
                        </div>
                        <div class="td-name" style="float: left;padding-left:8px;">
                          <a href="#jacket">{{v['name']}}</a>
                          <br><small>{{v['sn']}}</small>
                        </div>

                      </td>
                      <td>{{v['category_name']}}</td>
                      <td>{{v['retail_price']}}</td>
                      <td class="text-center">{{v['quantity']}}</td>
                      <td class="td-actions text-center">
                          <button type="button" rel="tooltip" onclick="edit('{{v['id']}}');" class="btn btn-success">
                              <i class="material-icons">edit</i>
                          </button>
                          <button type="button" onclick="del('{{v['id']}}');" rel="tooltip" class="btn btn-danger">
                              <i class="material-icons">close</i>
                          </button>
                      </td>
                  </tr>
                {% endfor %}

                 
                
              </tbody>
          </table>

           

         
              
              {{page|raw}}
           
      </div>
        
    </div>
  </div>
{% endblock %}


{% block script %}
  <script type="text/javascript">
    $(function(){

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

    function edit(id){
      window.location.href="/store/goods/edit/"+id;
    }

    function del(id){

      $.ajax({
        url: '/store/goods/del',
        type: 'POST',
        dataType: 'json',
        data: {"id": id},
      })
      .done(function(ret) {
        if(ret.status=='success'){
          $("#goods-"+id).remove();
          console.log(id);
        }
      });
      
    }
  </script>
 


{% endblock %}
