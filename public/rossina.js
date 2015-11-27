var myApp = angular.module('myApp', ['ng-admin']);

myApp.config(['NgAdminConfigurationProvider', function(NgAdminConfigurationProvider) {

    var customHeaderTemplate =
        '<div class="navbar-header">' +
        '<a class="navbar-brand" href="#" ng-click="appController.displayHome()">' +
        '<span class="glyphicon glyphicon-globe"></span>&nbsp;Plataforma Rossina Estamparia - Admin' +
    '</a>' +
    '</div>' +
    '<p class="navbar-text navbar-right">' +
    '<a href="https://github.com/marmelab/ng-admin/blob/master/examples/blog/config.js">' +
    '<span class="glyphicon glyphicon-sunglasses"></span>&nbsp;Veja o código' +
    '</a> ' +
     '<a href="https://github.com/marmelab/ng-admin/blob/master/examples/blog/config.js">' +
    '<span class="glyphicon glyphicon-sunglasses"></span>&nbsp;Veja o código' +
    '</a>' +
    '</p>';
    // create an admin application
    var nga = NgAdminConfigurationProvider;
    var admin = nga.application('Rossina Estamparia Admin')
    admin.header(customHeaderTemplate)
    .baseApiUrl('api/'); // main API endpoint


    //começa aqui a entidade Posts
    var post = nga.entity('posts');
    post.listView().fields([
        nga.field('id', 'number'),
        nga.field('title').label('Títulos').isDetailLink(true),
        nga.field('text').label('Texto')
            .map(function truncate(value) {
                if (!value) return '';
                return value.length > 50 ? value.substr(0, 50) + '...' : value;
            }),
        nga.field('active').label('Ativo'),
        nga.field('created_at', 'date').label('Criado').format('dd/MM/yyyy HH:mm:ss'),
        nga.field('updated_at', 'date').label('Atualizado').format('dd/MM/yyyy HH:mm:ss')
    ]).listActions(['edit', 'delete']);

    post.creationView().fields([
        nga.field('title').label('Título')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('text').label('Texto'),
        nga.field('active').label('Ativo'),
        nga.field('user_id').label('Usuário')
    ]);

    post.editionView().fields(post.creationView().fields());
    admin.addEntity(post)
    //termina aqui a entidade Posts


    //começa aqui a entidade Posts
    var categoria_blog = nga.entity('categoria-blogs');
    categoria_blog.listView().fields([
        nga.field('id', 'number'),
        nga.field('title').label('Títulos').isDetailLink(true),
        nga.field('description').label('Descrição')
            .map(function truncate(value) {
                if (!value) return '';
                return value.length > 50 ? value.substr(0, 50) + '...' : value;
            }),
        nga.field('created_at', 'date').label('Criado').format('dd/MM/yyyy HH:mm:ss'),
        nga.field('updated_at', 'date').label('Atualizado').format('dd/MM/yyyy HH:mm:ss')
    ]).listActions(['edit', 'delete']);

    categoria_blog.creationView().fields([
        nga.field('title').label('Título')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('description').label('Texto')
    ]);

    categoria_blog.editionView().fields(categoria_blog.creationView().fields());
    admin.addEntity(categoria_blog)
    //termina aqui a entidade Posts


    //começa aqui a entidade Comments
    var comment = nga.entity('comments');
    comment.listView().fields([
        nga.field('id', 'number'),
        nga.field('name').label('Títulos').isDetailLink(true),
        nga.field('text').label('Coméntario')
            .map(function truncate(value) {
                if (!value) return '';
                return value.length > 50 ? value.substr(0, 50) + '...' : value;
            }),
        nga.field('email').label('E-mail'),
        nga.field('active').label('Ativo'),
        nga.field('post_id').label('Post'),
        nga.field('created_at', 'date').label('Criado').format('dd/MM/yyyy HH:mm:ss'),
        nga.field('updated_at', 'date').label('Atualizado').format('dd/MM/yyyy HH:mm:ss')
    ]).listActions(['edit', 'delete']);

    comment.creationView().fields([
        nga.field('text').label('Texto')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('name').label('Título')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('email').label('E-mail'),
        nga.field('active').label('Ativo'),
        nga.field('post_id').label('Post')

    ]);
    comment.editionView().fields(comment.creationView().fields());
    admin.addEntity(comment)
    //termina aqui a entidade Comments


    //começa aqui a entidade Bloco Um
    var bloco_um = nga.entity('bloco-um');
    bloco_um.listView().fields([
        nga.field('id', 'number'),
        nga.field('title').label('Títulos').isDetailLink(true),
        nga.field('sub_title').label('Sub título')
            .map(function truncate(value) {
                if (!value) return '';
                return value.length > 50 ? value.substr(0, 50) + '...' : value;
            }),
        nga.field('alt').label('Alt').map(function truncate(value) {
            if (!value) return '';
            return value.length > 50 ? value.substr(0, 50) + '...' : value;
        }),
        nga.field('user_id').label('Usuário'),
        nga.field('created_at', 'date').label('Criado').format('dd/MM/yyyy HH:mm:ss'),
        nga.field('updated_at', 'date').label('Atualizado').format('dd/MM/yyyy HH:mm:ss')
    ]).listActions(['edit', 'delete']);

    bloco_um.creationView().fields([
        nga.field('title').label('Título')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('sub_title').label('Sub Título')
            .validation({ required: true, minlength: 3, maxlength: 500 }),
        nga.field('alt').label('Alt'),
        nga.field('user_id').label('Usuário')
    ]);
    bloco_um.editionView().fields(bloco_um.creationView().fields());
    admin.addEntity(bloco_um)
    //termina aqui a entidade Bloco Um

    //começa aqui a entidade Bloco Um Destaque
    var bloco_um_destaque = nga.entity('bloco-um-destaques');
    bloco_um_destaque.listView().fields([
        nga.field('id', 'number'),
        nga.field('title').label('Títulos').isDetailLink(true),
        nga.field('sub_title').label('Sub título')
            .map(function truncate(value) {
                if (!value) return '';
                return value.length > 50 ? value.substr(0, 50) + '...' : value;
            }),
        nga.field('alt').label('Alt').map(function truncate(value) {
            if (!value) return '';
            return value.length > 50 ? value.substr(0, 50) + '...' : value;
        }),
        nga.field('image_id').label('Imagem'),
        nga.field('user_id').label('Usuário'),
        nga.field('created_at', 'date').label('Criado').format('dd/MM/yyyy HH:mm:ss'),
        nga.field('updated_at', 'date').label('Atualizado').format('dd/MM/yyyy HH:mm:ss')
    ]).listActions(['edit', 'delete']);

    bloco_um_destaque.creationView().fields([
        nga.field('title').label('Título')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('sub_title').label('Sub Título')
            .validation({ required: true, minlength: 3, maxlength: 500 }),
        nga.field('alt').label('Alt'),
        nga.field('image_id').label('Imagem'),
        nga.field('user_id').label('Usuário')
    ]);
    bloco_um_destaque.editionView().fields(bloco_um_destaque.creationView().fields());
    admin.addEntity(bloco_um_destaque)
    //termina aqui a entidade Bloco Um Destaque

    //começa aqui a entidade Ferramentas
    var ferramenta = nga.entity('ferramentas');
    ferramenta.listView().fields([
        nga.field('id', 'number'),
        nga.field('title').label('Títulos').isDetailLink(true),
        nga.field('description').label('Descrição')
            .map(function truncate(value) {
                if (!value) return '';
                return value.length > 50 ? value.substr(0, 50) + '...' : value;
            }),
        nga.field('alt').label('Alt').map(function truncate(value) {
            if (!value) return '';
            return value.length > 50 ? value.substr(0, 50) + '...' : value;
        }),
        nga.field('user_id').label('Usuário'),
        nga.field('created_at', 'date').label('Criado').format('dd/MM/yyyy HH:mm:ss'),
        nga.field('updated_at', 'date').label('Atualizado').format('dd/MM/yyyy HH:mm:ss')
    ]).listActions(['edit', 'delete']);

    ferramenta.creationView().fields([
        nga.field('title').label('Título')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('description').label('Descrição')
            .validation({ required: true, minlength: 3, maxlength: 500 }),
        nga.field('alt').label('Alt'),
        nga.field('user_id').label('Usuário')
    ]);
    ferramenta.editionView().fields(ferramenta.creationView().fields());
    admin.addEntity(ferramenta)
    //termina aqui a entidade Ferramentas

    //começa aqui a entidade Bloco Dois
    var bloco_dois = nga.entity('bloco-dois');
    bloco_dois.listView().fields([
        nga.field('id', 'number'),
        nga.field('title').label('Títulos').isDetailLink(true),
        nga.field('sub_title').label('Sub Título')
            .map(function truncate(value) {
                if (!value) return '';
                return value.length > 50 ? value.substr(0, 50) + '...' : value;
            }),
        nga.field('alt').label('Alt').map(function truncate(value) {
            if (!value) return '';
            return value.length > 50 ? value.substr(0, 50) + '...' : value;
        }),
        nga.field('user_id').label('Usuário'),
        nga.field('created_at', 'date').label('Criado').format('dd/MM/yyyy HH:mm:ss'),
        nga.field('updated_at', 'date').label('Atualizado').format('dd/MM/yyyy HH:mm:ss')
    ]).listActions(['edit', 'delete']);

    bloco_dois.creationView().fields([
        nga.field('title').label('Título')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('sub_title').label('Sub Título')
            .validation({ required: true, minlength: 3, maxlength: 500 }),
        nga.field('alt').label('Alt'),
        nga.field('user_id').label('Usuário')
    ]);
    bloco_dois.editionView().fields(bloco_dois.creationView().fields());
    admin.addEntity(bloco_dois)
    //termina aqui a entidade Bloco Dois

    //começa aqui a entidade Bloco Dois Destaque 1
    var bloco_dois_destaque = nga.entity('bloco-dois-destaques');
    bloco_dois_destaque.listView().fields([
        nga.field('id', 'number'),
        nga.field('title').label('Títulos').isDetailLink(true),
        nga.field('sub_title').label('Sub Título')
            .map(function truncate(value) {
                if (!value) return '';
                return value.length > 50 ? value.substr(0, 50) + '...' : value;
            }),
        nga.field('alt').label('Alt').map(function truncate(value) {
            if (!value) return '';
            return value.length > 50 ? value.substr(0, 50) + '...' : value;
        }),
        nga.field('user_id').label('Usuário'),
        nga.field('created_at', 'date').label('Criado').format('dd/MM/yyyy HH:mm:ss'),
        nga.field('updated_at', 'date').label('Atualizado').format('dd/MM/yyyy HH:mm:ss')
    ]).listActions(['edit', 'delete']);

    bloco_dois_destaque.creationView().fields([
        nga.field('title').label('Título')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('sub_title').label('Sub Título')
            .validation({ required: true, minlength: 3, maxlength: 500 }),
        nga.field('alt').label('Alt'),
        nga.field('user_id').label('Usuário')
    ]);
    bloco_dois_destaque.editionView().fields(bloco_dois_destaque.creationView().fields());
    admin.addEntity(bloco_dois_destaque)
    //termina aqui a entidade Bloco Dois Destaque 1

    //começa aqui a entidade Bloco Dois Destaque 2
    var bloco_dois_destaque_um = nga.entity('bloco-dois-destaque-um');
    bloco_dois_destaque_um.listView().fields([
        nga.field('id', 'number'),
        nga.field('title').label('Títulos').isDetailLink(true),
        nga.field('sub_title').label('Sub Título')
            .map(function truncate(value) {
                if (!value) return '';
                return value.length > 50 ? value.substr(0, 50) + '...' : value;
            }),
        nga.field('alt').label('Alt').map(function truncate(value) {
            if (!value) return '';
            return value.length > 50 ? value.substr(0, 50) + '...' : value;
        }),
        nga.field('user_id').label('Usuário'),
        nga.field('created_at', 'date').label('Criado').format('dd/MM/yyyy HH:mm:ss'),
        nga.field('updated_at', 'date').label('Atualizado').format('dd/MM/yyyy HH:mm:ss')
    ]).listActions(['edit', 'delete']);

    bloco_dois_destaque_um.creationView().fields([
        nga.field('title').label('Título')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('sub_title').label('Sub Título')
            .validation({ required: true, minlength: 3, maxlength: 500 }),
        nga.field('alt').label('Alt'),
        nga.field('user_id').label('Usuário')
    ]);
    bloco_dois_destaque_um.editionView().fields(bloco_dois_destaque_um.creationView().fields());
    admin.addEntity(bloco_dois_destaque_um)
    //termina aqui a entidade Bloco Dois Destaque 2

    //começa aqui a entidade Bloco Dois Destaque 3
    var bloco_dois_destaque_dois = nga.entity('bloco-dois-destaque-dois');
    bloco_dois_destaque_dois.listView().fields([
        nga.field('id', 'number'),
        nga.field('title').label('Títulos').isDetailLink(true),
        nga.field('sub_title').label('Sub Título')
            .map(function truncate(value) {
                if (!value) return '';
                return value.length > 50 ? value.substr(0, 50) + '...' : value;
            }),
        nga.field('alt').label('Alt').map(function truncate(value) {
            if (!value) return '';
            return value.length > 50 ? value.substr(0, 50) + '...' : value;
        }),
        nga.field('user_id').label('Usuário'),
        nga.field('created_at', 'date').label('Criado').format('dd/MM/yyyy HH:mm:ss'),
        nga.field('updated_at', 'date').label('Atualizado').format('dd/MM/yyyy HH:mm:ss')
    ]).listActions(['edit', 'delete']);

    bloco_dois_destaque_dois.creationView().fields([
        nga.field('title').label('Título')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('sub_title').label('Sub Título')
            .validation({ required: true, minlength: 3, maxlength: 500 }),
        nga.field('alt').label('Alt'),
        nga.field('user_id').label('Usuário')
    ]);
    bloco_dois_destaque_dois.editionView().fields(bloco_dois_destaque_dois.creationView().fields());
    admin.addEntity(bloco_dois_destaque_dois)
    //termina aqui a entidade Bloco Dois Destaque 3

    //começa aqui a entidade Bloco Camisetas
    var bloco_camiseta = nga.entity('bloco-camisetas');
    bloco_camiseta.listView().fields([
        nga.field('id', 'number'),
        nga.field('title').label('Títulos').isDetailLink(true),
        nga.field('sub_title').label('Sub Título')
            .map(function truncate(value) {
                if (!value) return '';
                return value.length > 50 ? value.substr(0, 50) + '...' : value;
            }),
        nga.field('alt').label('Alt').map(function truncate(value) {
            if (!value) return '';
            return value.length > 50 ? value.substr(0, 50) + '...' : value;
        }),
        nga.field('user_id').label('Usuário'),
        nga.field('created_at', 'date').label('Criado').format('dd/MM/yyyy HH:mm:ss'),
        nga.field('updated_at', 'date').label('Atualizado').format('dd/MM/yyyy HH:mm:ss')
    ]).listActions(['edit', 'delete']);

    bloco_camiseta.creationView().fields([
        nga.field('title').label('Título')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('sub_title').label('Sub Título')
            .validation({ required: true, minlength: 3, maxlength: 500 }),
        nga.field('alt').label('Alt')
    ]);
    bloco_camiseta.editionView().fields(bloco_camiseta.creationView().fields());
    admin.addEntity(bloco_camiseta)
    //termina aqui a entidade Bloco Camisetas

    //começa aqui a entidade Bloco Camisetas Destaques
    var bloco_camiseta_destaque = nga.entity('bloco-camiseta-destaques');
    bloco_camiseta_destaque.listView().fields([
        nga.field('id', 'number'),
        nga.field('title').label('Títulos').isDetailLink(true),
        nga.field('sub_title').label('Sub Título')
            .map(function truncate(value) {
                if (!value) return '';
                return value.length > 50 ? value.substr(0, 50) + '...' : value;
            }),
        nga.field('alt').label('Alt').map(function truncate(value) {
            if (!value) return '';
            return value.length > 50 ? value.substr(0, 50) + '...' : value;
        }),
        nga.field('created_at', 'date').label('Criado').format('dd/MM/yyyy HH:mm:ss'),
        nga.field('updated_at', 'date').label('Atualizado').format('dd/MM/yyyy HH:mm:ss')
    ]).listActions(['edit', 'delete']);

    bloco_camiseta_destaque.creationView().fields([
        nga.field('title').label('Título')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('sub_title').label('Sub Título')
            .validation({ required: true, minlength: 3, maxlength: 500 }),
        nga.field('alt').label('Alt'),
        nga.field('user_id').label('Usuário')
    ]);
    bloco_camiseta_destaque.editionView().fields(bloco_camiseta_destaque.creationView().fields());
    admin.addEntity(bloco_camiseta_destaque)
    //termina aqui a entidade Bloco Camisetas Destaques

    //começa aqui a entidade Tags
    var tag = nga.entity('tags');
    tag.listView().fields([
        nga.field('id', 'number').isDetailLink(true),
        nga.field('title').label('Títulos'),
        nga.field('created_at', 'date').label('Criado').format('dd/MM/yyyy HH:mm:ss'),
        nga.field('updated_at', 'date').label('Atualizado').format('dd/MM/yyyy HH:mm:ss')
    ]).listActions(['edit', 'delete']);

    tag.creationView().fields([
        nga.field('title').label('Título')
            .validation({ required: true, minlength: 3, maxlength: 25 })
    ]);

    tag.editionView().fields(tag.creationView().fields());
    admin.addEntity(tag)
    //termina aqui a entidade Tags


    admin.menu(nga.menu()

         //começa o menu Blog
         .addChild(nga.menu().title('Blog')
             .addChild(nga.menu(post).title('Posts').icon('<span class="glyphicon glyphicon-align-center"></span>'))
             .addChild(nga.menu(categoria_blog).title('Categorias Posts').icon('<span class="glyphicon glyphicon-align-center"></span>'))
             .addChild(nga.menu(comment).title('Coméntarios').icon('<span class="glyphicon glyphicon-align-center"></span>'))
        )//termina menu Blog

        //começa o menu Home
        .addChild(nga.menu().title('Home')
             .addChild(nga.menu(bloco_um).title('Bloco Um').icon('<span class="glyphicon glyphicon-align-center"></span>'))
             .addChild(nga.menu(bloco_um_destaque).title('Bloco Um Destaque').icon('<span class="glyphicon glyphicon-align-center"></span>'))
             .addChild(nga.menu(ferramenta).title('Ferramentas').icon('<span class="glyphicon glyphicon-align-center"></span>'))
             .addChild(nga.menu(bloco_dois).title('Bloco Dois').icon('<span class="glyphicon glyphicon-align-center"></span>'))
             .addChild(nga.menu(bloco_dois_destaque).title('Bloco Dois Destaque 1').icon('<span class="glyphicon glyphicon-align-center"></span>'))
             .addChild(nga.menu(bloco_dois_destaque_um).title('Bloco Dois Destaque 2').icon('<span class="glyphicon glyphicon-align-center"></span>'))
             .addChild(nga.menu(bloco_dois_destaque_dois).title('Bloco Dois Destaque 3').icon('<span class="glyphicon glyphicon-align-center"></span>'))
             .addChild(nga.menu(bloco_camiseta).title('Bloco Camisetas').icon('<span class="glyphicon glyphicon-align-center"></span>'))
             .addChild(nga.menu(bloco_camiseta_destaque).title('Bloco Camiseta Destaque').icon('<span class="glyphicon glyphicon-align-center"></span>'))
        )//termina menu Home

        //começa o menu Outros
          .addChild(nga.menu().title('Outros')
              .addChild(nga.menu(tag).title('Lista de Tags').icon('<span class="glyphicon glyphicon-tags"></span>'))
        )//termina menu Outros
    );

    // attach the admin application to the DOM and run it
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