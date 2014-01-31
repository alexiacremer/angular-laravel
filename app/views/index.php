<!doctype html>
<html lang="en" ng-app>

<head>
	<meta charset="UTF-8">
	<title>Hackday Angular</title>

	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">

</head>

<body ng-controller="ProductsController">

<div class="container">

	<form class="form-inline pull-right" role="form" style="margin-top: 25px">
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Search" ng-model="search"/>
		</div>
	</form>

	<h1>Products <span ng-if="published()">({{ published() }} active)</span></h1>

	<div id="messages" ng-show="message">{{ message }}</div>

	<table class="table table-striped">
		<thead>
		<tr>
			<th>Name</th>
			<th>Sku</th>
			<th>Price</th>
			<th>Type</th>
			<th>Published</th>
			<th>Actions</th>
		</tr>
		</thead>
		<tbody>

		<tr ng-repeat="product in products | filter:search | orderBy:'name'">

			<td>{{ product.name }}</td>
			<td>{{ product.sku }}</td>
			<td>{{ product.price }}</td>
			<td>{{ product.type }}</td>
			<td><input type="checkbox" ng-model="product.published" ng-change="publishChange(product)"/></td>
			<td>
				<button ng-click="edit(product)" class="btn btn-primary btn-xs">Edit</button>
				<button ng-click="delete(product)" class="btn btn-danger btn-xs">Delete</button>
			</td>

		</tr>

		</tbody>
	</table>

	<form ng-submit="save()" class="form-inline" role="form" name="form" novalidate>

		<input type="hidden" ng-model="product.id"/>

		<div class="form-group" ng-class="{'has-error': form.name.$invalid}">
			<input type="text" name="name" class="form-control" placeholder="Name" ng-model="product.name" required/>
		</div>
		<div class="form-group" ng-class="{'has-error': form.sku.$invalid}">
			<input type="text" name="sku" class="form-control" placeholder="SKU" ng-model="product.sku" required float/>
		</div>
		<div class="form-group" ng-class="{'has-error': form.price.$invalid}">
			<input type="text" name="price" class="form-control" placeholder="Price" ng-model="product.price" ng-pattern="/^\-?\d+((\.)\d+)?$/" required/>
		</div>
		<div class="form-group" ng-class="{'has-error': form.type.$invalid}">
			<select class="form-control" name="type" ng-model="product.type" required>
				<option value="Software">Software</option>
				<option value="Hardware">Hardware</option>
			</select>
		</div>
		<div class="form-group">
			<input type="checkbox" class="form-control" ng-model="product.published"/> <label ng-show="product.published"> Published</label>
		</div>
		<div class="form-group">
			<button type="button" class="btn btn-default" ng-click="reset()">Clear</button>
			<button type="submit" class="btn btn-primary" ng-disabled="form.$invalid">Save</button>
		</div>

	</form>

	<br/>

	<pre>
		  	{{ products | json }}
	</pre>

</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.10/angular.min.js"></script>
<script src="/js/app.js"></script>

</body>
</html>
