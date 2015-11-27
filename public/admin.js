// Declara um novo módulo chamado 'myApp', e torná-lo exigir o módulo ng-admin` `como uma dependência
var myApp = angular.module('myApp', ['ng-admin']);

// Declara uma função a ser executada quando os bootstraps módulo (durante a fase de 'config')
myApp.config(['NgAdminConfigurationProvider', function (nga) {
    // Criar um aplicativo de administração

    var admin = nga.application('Rossina Estamparia Admin')
    .baseApiUrl('http://jsonplaceholder.typicode.com/'); // main API endpoint


    //começa aqui a entidade users
    var user = nga.entity('users');
    user.listView().fields([
        // Usar o nome como o link para a visualização de detalhes - a visão edição
        nga.field('name').isDetailLink(true),
        nga.field('username'),
        nga.field('email')
    ])
        .listActions(['edit']);

    user.creationView().fields([
        nga.field('name')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('username')
            .attributes({ placeholder: 'Sem espaço permitido, 5 caracteres min' })
            .validation({ required: true, pattern: '[A-Za-z0-9\.\-_]{5,20}' }),
        nga.field('email', 'email')
            .validation({ required: true }),
        nga.field('address.street')
            .label('Street'),
        nga.field('address.city')
            .label('City'),
        nga.field('address.zipcode')
            .attributes({ placeholder: 'somente números' })
            .label('ZipCode')
            .validation({ pattern: '[A-Z\-0-9]{5,10}' }),
        nga.field('phone'),
        nga.field('website')
            .validation({ validator: function(value) {
                if (value.indexOf('http://') !== 0) throw new Error('URL de site inválida');
            }})
    ]);
    // Utilizar os mesmos campos para o editionVer como para a creationView
    user.editionView(['back']).fields(user.creationView().fields());
    admin.addEntity(user)
    //fim da entidade users


    //começa aqui a entidade posts
    var post = nga.entity('posts');
        post.readOnly();
        post.listView()
            .fields([
                nga.field('title').isDetailLink(true),
                nga.field('body', 'text')
                    .map(function truncate(value) {
                        if (!value) return '';
                        return value.length > 50 ? value.substr(0, 50) + '...' : value;
                    }),
                nga.field('userId', 'reference')
                    .targetEntity(user)
                    .targetField(nga.field('username'))
                    .label('Author')
            ])
            .listActions(['show','edit'])
            .batchActions([])
        .filters([
                nga.field('q')
                    .label('')
                    .pinned(true)
                    .template('<div class="input-group"><input type="text" ng-model="value" placeholder="Pesquisar" class="form-control"></input><span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span></div>'),
                nga.field('userId', 'reference')
                    .targetEntity(user)
                    .targetField(nga.field('username'))
                    .label('User')
            ]);

    post.showView().fields([
        nga.field('title'),
        nga.field('body', 'text'),
        nga.field('userId', 'reference')
            .targetEntity(user)
            .targetField(nga.field('username'))
            .label('User'),
        nga.field('comments', 'referenced_list')
            .targetEntity(nga.entity('comments'))
            .targetReferenceField('postId')
            .targetFields([
                nga.field('id'),
                nga.field('created_at').label('Posted'),
                nga.field('body').label('Comment')
            ])
            .sortField('created_at')
            .sortDir('DESC')
            .listActions(['edit'])
    ])
    post.creationView().fields([
        nga.field('title')
            .validation({ required: true, minlength: 3, maxlength: 250 }),
        nga.field('body')
    ]);

    post.editionView().fields(post.creationView().fields());
    admin.addEntity(post)
    //fim da entidade posts


    //entidade album começa aqui
    var comment = nga.entity('comments');
    comment.listView().fields([
        // Usar o nome como o link para a visualização de detalhes - a visão edição
        nga.field('id'),
        nga.field('name').isDetailLink(true),
        nga.field('email'),
        nga.field('body')
    ])

    comment.creationView().fields([
        nga.field('name')
            .validation({ required: true, minlength: 3, maxlength: 250 }),
        nga.field('email')
            .validation({ required: true }),
        nga.field('body')
    ]);
    comment.editionView().fields(comment.creationView().fields());
    admin.addEntity(comment)
    //fim da entidade album


    //entidade album começa aqui
    var album = nga.entity('albums');
    album.listView().fields([
        // Usar o nome como o link para a visualização de detalhes - a visão edição
        nga.field('id'),
        nga.field('title').isDetailLink(true)
    ]);
    admin.addEntity(album)
    //fim da entidade album

    //entidade todos começa aqui
    var todo = nga.entity('todos');
    todo.listView().fields([
        // Usar o nome como o link para a visualização de detalhes - a visão edição
        nga.field('id'),
        nga.field('title').isDetailLink(true),
    ])

    todo.creationView().fields([
        nga.field('title')
            .validation({ required: true, minlength: 3, maxlength: 250 })
    ]);
    todo.editionView().fields(todo.creationView().fields());
    admin.addEntity(todo)
    //fim da entidade todos

    //configuração do menu lateral do admin do sistema
    admin.menu(nga.menu()
            .addChild(nga.menu(user).icon('<span class="glyphicon glyphicon-user"></span>'))
            .addChild(nga.menu(post).icon('<span class="glyphicon glyphicon-pencil"></span>'))
            .addChild(nga.menu(comment).icon('<span class="glyphicon glyphicon-comment"></span>'))
            .addChild(nga.menu(album).icon('<span class="glyphicon glyphicon-book"></span>'))
            .addChild(nga.menu(todo).icon('<span class="glyphicon glyphicon-book"></span>'))
    );
    //fim do menu lataeral do sistema de admin rossina estamparia digital

    // Anexar a aplicação admin para o DOM e executá-lo
    nga.configure(admin);

}]);

myApp.config(['RestangularProvider', function (RestangularProvider) {
    RestangularProvider.addFullRequestInterceptor(function(element, operation, what, url, headers, params) {
        if (operation == "getList") {
            // custom pagination params
            if (params._page) {
                params._start = (params._page - 1) * params._perPage;
                params._end = params._page * params._perPage;
            }
            delete params._page;
            delete params._perPage;
            // custom sort params
            if (params._sortField) {
                params._sort = params._sortField;
                params._order = params._sortDir;
                delete params._sortField;
                delete params._sortDir;
            }
            // custom filters
            if (params._filters) {
                for (var filter in params._filters) {
                    params[filter] = params._filters[filter];
                }
                delete params._filters;
            }
        }
        return { params: params };
    });
}]);