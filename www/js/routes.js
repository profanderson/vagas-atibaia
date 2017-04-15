angular.module('app.routes', [])

.config(function($stateProvider, $urlRouterProvider) {

  // Ionic uses AngularUI Router which uses the concept of states
  // Learn more here: https://github.com/angular-ui/ui-router
  // Set up the various states which the app can be in.
  // Each state's controller can be found in controllers.js
  $stateProvider
    
  

    .state('vagasDeEmpregoEmAtibaia', {
    url: '/index',
    templateUrl: 'templates/vagasDeEmpregoEmAtibaia.html',
    controller: 'vagasDeEmpregoEmAtibaiaCtrl'
  })

  .state('sobre', {
    url: '/sobre',
    templateUrl: 'templates/sobre.html',
    controller: 'sobreCtrl'
  })

  .state('notificaEs', {
    url: '/notificacao',
    templateUrl: 'templates/notificaEs.html',
    controller: 'notificaEsCtrl'
  })

  .state('vagasDoPAT', {
    url: '/pat',
    templateUrl: 'templates/vagasDoPAT.html',
    controller: 'vagasDoPATCtrl'
  })

  .state('vagasDoAtibaiaComBr', {
    url: '/atibaia',
    templateUrl: 'templates/vagasDoAtibaiaComBr.html',
    controller: 'vagasDoAtibaiaComBrCtrl'
  })

  .state('vagasDaRMDesenvEmRH', {
    url: '/rmrh',
    templateUrl: 'templates/vagasDaRMDesenvEmRH.html',
    controller: 'vagasDaRMDesenvEmRHCtrl'
  })
          
   .state('cursosDoPAT', {
    url: '/cursosPat',
    templateUrl: 'templates/cursosDoPAT.html',
    controller: 'cursosDoPATCtrl'
  })
  
     .state('cursosDaEtec', {
    url: '/cursosEtec',
    templateUrl: 'templates/cursosDaEtec.html',
    controller: 'cursosDaEtecCtrl'
  })

$urlRouterProvider.otherwise('/index')  

});