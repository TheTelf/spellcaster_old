angular.module('mainCtrl', [])

    // inject the service into our controller
    .controller('mainController', function($scope, $http, Battle, $routeParams) {
        // object to hold all the data for the new comment form
        $scope.battleData = {};

        // loading variable to show the spinning loading icon
        $scope.loading = true;

        // get all the comments first and bind it to the $scope.comments object
        // use the function we created in our service
        // GET ALL COMMENTS ==============
        Battle.show(2)
            .success(function(data) {
                $scope.battle = data;
                $scope.loading = false;
            });
    });