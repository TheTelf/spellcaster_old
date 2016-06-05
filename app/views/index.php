<!doctype html> <html lang="en"> <head> <meta charset="UTF-8"> <title>Test</title>

    <!-- CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"> <!-- load bootstrap via cdn -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"> <!-- load fontawesome -->

    <!-- JS -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

    <script>

        angular.module('battleService', [])

            .factory('Battle', function($http) {

                return {
                    // get all the battles
                    get : function() {
                        return $http.get('/api/battles');
                    },

                    show : function(id) {
                        return $http.get('/api/battles/'+id);
                    },

                    // save a battle
                    save : function(battleData) {
                        return $http({
                            method: 'POST',
                            url: '/api/battles',
                            headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                            data: $.param(battleData)
                        });
                    },

                    action : function(id, target, spell) {
                        return $http({
                            method: 'POST',
                            url: '/api/battles/'+id+'/action',
                            headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                            data: $.param({target: target, spell: spell})
                    });
                    },

                }

            });

        /*angular.module('mainCtrl', [])

            // inject the service into our controller
            .controller('mainController', function($scope, $http, Battle) {
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


        var battleApp = angular.module('battleApp', ['mainCtrl', 'battleService']);*/

       var app = angular.module('spellcasterApp', ['battleService']);
       app.controller('battleController', function($scope, $http, $log, Battle) {
           // object to hold all the data for the new comment form
           $scope.battleData = {};

           // loading variable to show the spinning loading icon
           $scope.loading = true;

           $scope.actionData = {};

           // get all the comments first and bind it to the $scope.comments object
           // use the function we created in our service
           // GET ALL COMMENTS ==============
           Battle.show(1)
               .success(function(data) {
                   $scope.battle = data;
                   $scope.loading = false;
               });

           $scope.attack = function() {
               Battle.action(1, $scope.actionData.target, null);
           }

           $scope.cast = function() {
               Battle.action(1, $scope.actionData.target, $scope.actionData.spell);
           }
       });

    </script>



    <!-- ANGULAR -->
    <!-- all angular resources will be loaded from the /public folder -->
    <!--    <script src="js/controllers/mainCtrl.js"></script> <!-- load our controller -->
    <!--    <script src="js/services/commentService.js"></script> <!-- load our service -->
    <!--    <script src="js/app.js"></script> <!-- load our application -->


</head>
<!-- declare our angular app and controller -->
<body  ng-app="spellcasterApp" ng-controller="battleController"> <div class="col-md-8 col-md-offset-2">

    <!-- PAGE TITLE =============================================== -->
    <div class="page-header">
        <h2>Battle time</h2>
    </div>

    <div ng-app="">
        <h1>Battle id is #{{battle.id}}</h1>
        <h1>Battle involves the following fighters:</h1>
        <div ng-repeat="fighter in battle.fighters track by fighter.id">
            <input type="radio" name="actionData.target" ng-model="actionData.target" value="{{fighter.id}}" ng-hide="{{fighter.user.id == 1}}"/> {{fighter.identifier}} ({{fighter.hp}} HP)
        </div>
        <div>Chosen target = {{actionData.target}}</div>
    </div>

    <div>
        <input type="button" value="Attack" ng-click="attack()">
    </div>
    or
    <div>
        <input type="spell" ng-model="actionData.spell" value="">
        <div>Spell: {{actionData.spell}}</div>
        <input type="button" value="Cast Spell" ng-click="cast()")>
    </div>
</body>
</html>
