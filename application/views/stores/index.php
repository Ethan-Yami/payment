{% extends "/layout/store_boot.html" %}


{% block head %}
 {{ parent() }}
<style>
    html,body{margin:0px;padding: 0px;}   
    .nav-link{padding-top: 0px;}
    tr,td{margin-top: 0px;}
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
                  <tr>
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
                            <img src="https://images.thenorthface.com/is/image/TheNorthFace/NF0A2VFL_619_hero" style="width: 40px">
                        </div>
                        <div class="td-name" style="float: left;padding-left:8px;">
                          <a href="#jacket">Spring Jacket</a>
                          <br><small>by Dolce&amp;Gabbana</small>
                        </div>

                      </td>
                      <td>Develop</td>
                      <td>2013</td>
                      <td class="text-center">&euro; 99,225</td>
                      <td class="td-actions text-center">
                          <button type="button" rel="tooltip" class="btn btn-success">
                              <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" class="btn btn-danger">
                              <i class="material-icons">close</i>
                          </button>
                      </td>
                  </tr>

                 
                
              </tbody>
          </table>
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
  </script>
 


{% endblock %}
