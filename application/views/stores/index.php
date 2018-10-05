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
        <a href='/store/goods/create' class="btn btn-info btn-sm">增加</a>
        <button type="button" class="btn btn-success btn-sm">导入</button>
        <button type="button" class="btn btn-danger btn-sm">导出</button>
       

      </div>

      <div class="col-md-12">        

        <div class="table-responsive card" style="margin-top:0px;padding-top:0px;">

          <table class="table table-shopping">
              <thead>
                  <tr>
                      <th class="text-center"></th>
                      <th>Product</th>
                      <th class="th-description">Color</th>
                      <th class="th-description">Size</th>
                      <th class="text-right">Price</th>
                      <th class="text-right">Qty</th>
                      <th class="text-right">Amount</th>
                      <th class="text-right">Actions</th>
                  </tr>
              </thead>
              <tbody>
                
                   <tr>
                      <td>
                          <div class="img-container text-center">
                              <img src="https://images.thenorthface.com/is/image/TheNorthFace/NF0A2VFL_619_hero" style="width: 50px">
                          </div>
                      </td>
                      <td class="td-name">
                          <a href="#jacket">Spring Jacket</a>
                          <br><small>by Dolce&amp;Gabbana</small>
                      </td>
                      <td>
                          Red
                      </td>
                      <td>
                          M
                      </td>
                      <td class="td-number">
                          <small>&#x20AC;</small>549
                      </td>
                      <td class="td-number">
                         
                      </td>
                      <td class="td-number">
                          <small>&#x20AC;</small>549
                      </td>
                      <td class="td-actions text-right">
                      
                        <button type="button" rel="tooltip" class="btn btn-success btn-round">
                            <i class="material-icons">edit</i>
                        </button>
                        <button type="button" rel="tooltip" class="btn btn-danger btn-round">
                            <i class="material-icons">close</i>
                        </button>
                    </td>
                  </tr>

              </tbody>
          </table>
        </div>   



        <table class="table" style="background-color: white;">
              <thead>
                  <tr>
                      <th class="text-center">#</th>
                      <th>Name</th>
                      <th>Job Position</th>
                      <th>Since</th>
                      <th class="text-right">Salary</th>
                      <th class="text-right">Actions</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td class="text-center">1</td>
                      <td>Andrew Mike</td>
                      <td>Develop</td>
                      <td>2013</td>
                      <td class="text-right">&euro; 99,225</td>
                      <td class="td-actions text-right">
                          <button type="button" rel="tooltip" class="btn btn-info">
                              <i class="material-icons">person</i>
                          </button>
                          <button type="button" rel="tooltip" class="btn btn-success">
                              <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" class="btn btn-danger">
                              <i class="material-icons">close</i>
                          </button>
                      </td>
                  </tr>
                  <tr>
                      <td class="text-center">2</td>
                      <td>John Doe</td>
                      <td>Design</td>
                      <td>2012</td>
                      <td class="text-right">&euro; 89,241</td>
                      <td class="td-actions text-right">
                          <button type="button" rel="tooltip" class="btn btn-info btn-round">
                              <i class="material-icons">person</i>
                          </button>
                          <button type="button" rel="tooltip" class="btn btn-success btn-round">
                              <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" class="btn btn-danger btn-round">
                              <i class="material-icons">close</i>
                          </button>
                      </td>
                  </tr>
                  <tr>
                      <td class="text-center">3</td>
                      <td>Alex Mike</td>
                      <td>Design</td>
                      <td>2010</td>
                      <td class="text-right">&euro; 92,144</td>
                      <td class="td-actions text-right">
                          <button type="button" rel="tooltip" class="btn btn-info btn-simple">
                              <i class="material-icons">person</i>
                          </button>
                          <button type="button" rel="tooltip" class="btn btn-success btn-simple">
                              <i class="material-icons">edit</i>
                          </button>
                          <button type="button" rel="tooltip" class="btn btn-danger btn-simple">
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




{% endblock %}
