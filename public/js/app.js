function ProductsController($scope, $http) {

	$scope.editProduct = {};

	$http.get('/products').success(function (data, status, headers, config) {
		$scope.products = data;

		console.log($scope.products);

	});

	$scope.published = function () {
		var count = 0;
		angular.forEach($scope.products, function (product) {
			count += product.published ? 1 : 0;
		});
		return count;
	};

	$scope.save = function () {
		$scope.products.push($scope.product);
		$http.post('products', $scope.product);
		$scope.product = {};
	};

	$scope.edit = function (product) {
		$scope.product = product;
	};

	$scope.delete = function (product) {
		angular.forEach($scope.products, function (pr, key) {
			if (pr.id == product.id) {
				$scope.products.splice(key, 1);
			}
		});
		$http.post('product/delete', product);
	};

	$scope.reset = function () {
		$scope.product = {};
	};

	$scope.publishChange = function (product) {
		$http.post('products', product);
	};

}