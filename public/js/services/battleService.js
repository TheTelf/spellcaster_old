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

        }

    });