{% extends "/layout/store_boot.html" %}


{% block head %}
 {{ parent() }}
<style>
    html,body{margin:0px;padding: 0px;}
    .main-panel>.content{margin-top: 16px;}
    .goods-thumb{width: 200px;
    height: 200px;
    border: 1px solid black;
    background-color: white;
    position: absolute;
    top: 28px;
    left: 96px;}

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
          增加商品
        </div>
        <div class="card-body">
          
          <form>
            
            
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>商品名称</label>
                <input type="text" class="form-control">
              </div>
              <div class="col-md-6">
                 
                <div class="goods-thumb">
                  
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6" >
                
                       <label style="position: relative;top: -20px;">商品分类</label>
                        <select class="form-control" style="margin-top:-28px;padding-top:0px;height:36px;">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
              </div>
              <div class="form-group col-md-6">
                 <a href="javascript:void(0);" class="btn btn-info btn-sm">创建</a>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>商品编码</label>
                <input type="text" class="form-control">
              </div>              
                     
            </div>

            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="inputEmail4">零售价</label>
                <input type="text" class="form-control">
              </div>
              <div class="form-group col-md-3">
                <label for="inputPassword4">进货价</label>
                <input type="text" class="form-control">
              </div>
             
            </div>          

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>图片</label>
                <input type="text" class="form-control">
              </div>
              <div class="form-group col-md-1">
                <a href="javascript:void(0);" class="btn btn-info btn-sm">选择</a>
              </div>
              <div class="form-group col-md-3">               
              </div>          
            </div>
           
            <div class="form-row">
              <div class="form-group col-md-8 text-center">
                 <button type="submit" class="btn btn-success">确认增加</button>
              </div>
                   
            </div>
         
          
          </form>



        </div>
      </div>

    </div>
  </div>
{% endblock %}


{% block script %}




{% endblock %}
