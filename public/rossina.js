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

    //começa aqui a entidade Usuários
    var user = nga.entity('users');
    user.listView().fields([
        nga.field('id', 'number'),
        nga.field('name').label('Nome').isDetailLink(true),
        nga.field('email').label('E-mail')
            .map(function truncate(value) {
                if (!value) return '';
                return value.length > 50 ? value.substr(0, 50) + '...' : value;
            }),
        nga.field('created_at', 'date').label('Criado').format('dd/MM/yyyy HH:mm:ss'),
        nga.field('updated_at', 'date').label('Atualizado').format('dd/MM/yyyy HH:mm:ss')
    ]).listActions(['edit', 'delete']);

    user.creationView().fields([
        nga.field('name').label('Nome')
            .validation({ required: true, minlength: 3, maxlength: 10 }),
        nga.field('email').label('E-mail')
            .validation({ required: true, minlength: 3, maxlength: 50 }),
    ]);
    user.editionView().fields(user.creationView().fields());
    admin.addEntity(user)
    //termina aqui a entidade Usuários

    //começa aqui a entidade Posts
    var post = nga.entity('posts');
    post.listView().fields([
        //nga.field('id', 'number'),
        nga.field('title').label('Títulos').isDetailLink(true),
        nga.field('text').label('Texto')
            .map(function truncate(value) {
                if (!value) return '';
                return value.length > 50 ? value.substr(0, 50) + '...' : value;
            }),
        nga.field('tag', 'reference_many')
            .targetEntity(nga.entity('tags'))
            .targetField(nga.field('title'))
            .singleApiCall(ids => ({'id': ids })),
        nga.field('active' , 'boolean').label('Ativo')
            .choices([
                { value: null, label: 'nulo' },
                { value: true, label: 'ativo' },
                { value: false, label: 'desativado' }
            ]),
        nga.field('user_id', 'reference')
            .targetEntity(user)
            .targetField(nga.field('name'))
            .label('Usuário'),
        nga.field('created_at', 'date').label('Criado').format('dd/MM/yyyy HH:mm:ss'),
        nga.field('updated_at', 'date').label('Atualizado').format('dd/MM/yyyy HH:mm:ss')
    ]).listActions(['edit', 'delete', 'show']
    );
    post.creationView().fields([
        nga.field('title').label('Título')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('text', 'text').label('Texto'),
        nga.field('active' , 'boolean').label('Ativo')
            .choices([
                { value: null, label: 'nulo' },
                { value: true, label: 'ativo' },
                { value: false, label: 'desativado' }
            ]),
        nga.field('user_id', 'reference')
            .targetEntity(user)
            .targetField(nga.field('name'))
            .remoteComplete(true)
            .label('Usuário'),
        nga.field('tags', 'embedded_list')
            .targetFields([
                nga.field('title')
            ])
    ]);

    post.showView().fields([
        nga.field('title').label('Título'),
        nga.field('text', 'text').label('texto'),
        nga.field('user_id', 'reference')
            .targetEntity(user)
            .targetField(nga.field('name'))
            .label('Criado por >'),
        nga.field('tags', 'embedded_list')
            .targetFields([
                nga.field('title').label('Tags')
            ]),
        nga.field('comments', 'referenced_list').label('Comentários')
            .targetEntity(nga.entity('comments'))
            .targetReferenceField('post_id')
            .targetFields([
                nga.field('name').label('Nome'),
                nga.field('text').label('Texto'),
                nga.field('email').label('E-mail')
            ])
            .sortField('id')
            .sortDir('DESC')
            .listActions(['edit']),
    ]);

    post.editionView().fields([
        nga.field('title').label('Título')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('text', 'text').label('Texto'),
        nga.field('active' , 'boolean').label('Ativo')
            .choices([
                { value: null, label: 'nulo' },
                { value: true, label: 'ativo' },
                { value: false, label: 'desativado' }
            ]),
        nga.field('user_id', 'reference')
            .targetEntity(user)
            .targetField(nga.field('name'))
            .remoteComplete(true)
            .label('Usuário'),
        nga.field('tag', 'reference_many')
            .targetEntity(nga.entity('tags'))
            .targetField(nga.field('title'))
            .attributes({ placeholder: 'Selecione as tags...' })
            .remoteComplete(true, {
                refreshDelay: 300 ,
                searchQuery: search => ({ q: search })}),
        nga.field('updated_at', 'datetime').label('Atualizado em')
    ]);

    admin.addEntity(post)
    //termina aqui a entidade Posts


    //começa aqui a entidade Categoria Categoria Posts
    var categoria_blog = nga.entity('categoria-blogs');
    categoria_blog.listView().fields([
        //nga.field('id', 'number'),
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
        nga.field('description', 'text').label('Texto')
    ]);

    categoria_blog.editionView().fields(categoria_blog.creationView().fields());
    admin.addEntity(categoria_blog)
    //termina aqui a entidade Categoria Categoria Posts


    //começa aqui a entidade Comments
    var comment = nga.entity('comments');
    comment.listView().fields([
        //nga.field('id', 'number'),
        nga.field('name').label('Nome').isDetailLink(true),
        nga.field('text').label('Coméntario')
            .map(function truncate(value) {
                if (!value) return '';
                return value.length > 50 ? value.substr(0, 50) + '...' : value;
            }),
        nga.field('email').label('E-mail'),
        nga.field('active' , 'boolean').label('Ativo')
            .choices([
                { value: null, label: 'nulo' },
                { value: true, label: 'ativo' },
                { value: false, label: 'desativado' }
            ]),
        nga.field('post_id', 'reference')
            .targetEntity(post)
            .targetField(nga.field('title'))
            .label('Post'),
        nga.field('created_at', 'date').label('Criado').format('dd/MM/yyyy HH:mm:ss'),
        nga.field('updated_at', 'date').label('Atualizado').format('dd/MM/yyyy HH:mm:ss')
    ]).listActions(['edit', 'delete']);

    comment.creationView().fields([
        nga.field('text', 'text').label('Texto')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('name').label('Nome')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('email').label('E-mail'),
        nga.field('active').label('Ativo'),
        nga.field('post_id').label('Post')

    ]);

    comment.editionView().fields([
        nga.field('text', 'text').label('Texto')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('name').label('Nome')
            .validation({ required: true, minlength: 3, maxlength: 500 }),
        nga.field('email').label('E-mail'),
        nga.field('active' , 'boolean').label('Ativo')
            .choices([
                { value: null, label: 'nulo' },
                { value: true, label: 'ativo' },
                { value: false, label: 'desativado' }
            ]),
        nga.field('post_id', 'reference')
            .targetEntity(post)
            .targetField(nga.field('title'))
            .remoteComplete(true)
            .label('Post'),
        //nga.field('created_at', 'date').label('Criado').format('yyyy-MM-dd HH:mm:ss'),
        nga.field('updated_at', 'datetime').label('Atualizado').format('dd-MM-yyyy hh:mm:ss')
    ]);

    //comment.editionView().fields(comment.creationView().fields());
    admin.addEntity(comment)
    //termina aqui a entidade Comments


    //começa aqui a entidade Bloco Um
    var bloco_um = nga.entity('bloco-um');
    bloco_um.listView().fields([
        //nga.field('id', 'number'),
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
        nga.field('user_id', 'reference')
            .targetEntity(user)
            .targetField(nga.field('name'))
            .label('Usuário'),
        nga.field('created_at', 'date').label('Criado').format('dd/MM/yyyy HH:mm:ss'),
        nga.field('updated_at', 'date').label('Atualizado').format('dd/MM/yyyy HH:mm:ss')
    ]).listActions(['edit', 'delete']);

    bloco_um.creationView().fields([
        nga.field('title').label('Título')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('sub_title', 'text').label('Sub Título')
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
        //nga.field('id', 'number'),
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
        nga.field('user_id', 'reference')
            .targetEntity(user)
            .targetField(nga.field('name'))
            .label('Usuário'),
        nga.field('created_at', 'date').label('Criado').format('dd/MM/yyyy HH:mm:ss'),
        nga.field('updated_at', 'date').label('Atualizado').format('dd/MM/yyyy HH:mm:ss')
    ]).listActions(['edit', 'delete']);

    bloco_um_destaque.creationView().fields([
        nga.field('title').label('Título')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('sub_title', 'text').label('Sub Título')
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
        //nga.field('id', 'number'),
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
        nga.field('user_id', 'reference')
            .targetEntity(user)
            .targetField(nga.field('name'))
            .label('Usuário'),
        nga.field('created_at', 'date').label('Criado').format('dd/MM/yyyy HH:mm:ss'),
        nga.field('updated_at', 'date').label('Atualizado').format('dd/MM/yyyy HH:mm:ss')
    ]).listActions(['edit', 'delete']);

    ferramenta.creationView().fields([
        nga.field('title').label('Título')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('description', 'text').label('Descrição')
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
        //nga.field('id', 'number'),
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
        nga.field('user_id', 'reference')
            .targetEntity(user)
            .targetField(nga.field('name'))
            .label('Usuário'),
        nga.field('created_at', 'date').label('Criado').format('dd/MM/yyyy HH:mm:ss'),
        nga.field('updated_at', 'date').label('Atualizado').format('dd/MM/yyyy HH:mm:ss')
    ]).listActions(['edit', 'delete']);

    bloco_dois.creationView().fields([
        nga.field('title').label('Título')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('sub_title', 'text').label('Sub Título')
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
        //nga.field('id', 'number'),
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
        nga.field('user_id', 'reference')
            .targetEntity(user)
            .targetField(nga.field('name'))
            .label('Usuário'),
        nga.field('created_at', 'date').label('Criado').format('dd/MM/yyyy HH:mm:ss'),
        nga.field('updated_at', 'date').label('Atualizado').format('dd/MM/yyyy HH:mm:ss')
    ]).listActions(['edit', 'delete']);

    bloco_dois_destaque.creationView().fields([
        nga.field('title').label('Título')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('sub_title', 'text').label('Sub Título')
            .validation({ required: true, minlength: 3, maxlength: 500 }),
        nga.field('alt').label('Alt'),
        nga.field('user_id', 'reference')
            .targetEntity(user)
            .targetField(nga.field('name'))
            .remoteComplete(true)
            .label('Usuário')
    ]);

    bloco_dois_destaque.editionView().fields([
        nga.field('title').label('Título')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('sub_title', 'text').label('Sub Título')
            .validation({ required: true, minlength: 3, maxlength: 500 }),
        nga.field('user_id', 'reference')
            .targetEntity(user)
            .targetField(nga.field('name'))
            .remoteComplete(true)
            .label('Usuário'),
    ]);
    admin.addEntity(bloco_dois_destaque)
    //termina aqui a entidade Bloco Dois Destaque 1

    //começa aqui a entidade Bloco Dois Destaque 2
    var bloco_dois_destaque_um = nga.entity('bloco-dois-destaque-um');
    bloco_dois_destaque_um.listView().fields([
        //nga.field('id', 'number'),
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
        nga.field('user_id', 'reference')
            .targetEntity(user)
            .targetField(nga.field('name'))
            .label('Usuário'),
        nga.field('created_at', 'date').label('Criado').format('dd/MM/yyyy HH:mm:ss'),
        nga.field('updated_at', 'date').label('Atualizado').format('dd/MM/yyyy HH:mm:ss')
    ]).listActions(['edit', 'delete']);

    bloco_dois_destaque_um.creationView().fields([
        nga.field('title').label('Título')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('sub_title', 'text').label('Sub Título')
            .validation({ required: true, minlength: 3, maxlength: 500 }),
        nga.field('alt').label('Alt'),
        nga.field('user_id', 'reference')
            .targetEntity(user)
            .targetField(nga.field('name'))
            .remoteComplete(true)
            .label('Usuário')
    ]);

    bloco_dois_destaque_um.editionView().fields([
        nga.field('title').label('Título')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('sub_title', 'text').label('Sub Título')
            .validation({ required: true, minlength: 3, maxlength: 500 }),
        nga.field('user_id', 'reference')
            .targetEntity(user)
            .targetField(nga.field('name'))
            .remoteComplete(true)
            .label('Usuário'),
    ]);
    admin.addEntity(bloco_dois_destaque_um)
    //termina aqui a entidade Bloco Dois Destaque 2

    //começa aqui a entidade Bloco Dois Destaque 3
    var bloco_dois_destaque_dois = nga.entity('bloco-dois-destaque-dois');
    bloco_dois_destaque_dois.listView().fields([
        //nga.field('id', 'number'),
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
        nga.field('user_id', 'reference')
            .targetEntity(user)
            .targetField(nga.field('name'))
            .label('Usuário'),
        nga.field('created_at', 'date').label('Criado').format('dd/MM/yyyy HH:mm:ss'),
        nga.field('updated_at', 'date').label('Atualizado').format('dd/MM/yyyy HH:mm:ss')
    ]).listActions(['edit', 'delete']);

    bloco_dois_destaque_dois.creationView().fields([
        nga.field('title').label('Título')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('sub_title', 'text').label('Sub Título')
            .validation({ required: true, minlength: 3, maxlength: 500 }),
        nga.field('alt').label('Alt'),
        nga.field('user_id', 'reference')
            .targetEntity(user)
            .targetField(nga.field('name'))
            .remoteComplete(true)
            .label('Usuário')
    ]);

    bloco_dois_destaque_dois.editionView().fields([
        nga.field('title').label('Título')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('sub_title', 'text').label('Sub Título')
            .validation({ required: true, minlength: 3, maxlength: 500 }),
        nga.field('user_id', 'reference')
            .targetEntity(user)
            .targetField(nga.field('name'))
            .remoteComplete(true)
            .label('Usuário'),
    ]);
    admin.addEntity(bloco_dois_destaque_dois)
    //termina aqui a entidade Bloco Dois Destaque 3

    //começa aqui a entidade Bloco Camisetas
    var bloco_camiseta = nga.entity('bloco-camisetas');
    bloco_camiseta.listView().fields([
        //nga.field('id', 'number'),
        nga.field('title').label('Títulos').isDetailLink(true),
        nga.field('sub_title').label('Sub Título')
            .map(function truncate(value) {
                if (!value) return '';
                return value.length > 50 ? value.substr(0, 50) + '...' : value;
            }),
        nga.field('user_id', 'reference')
            .targetEntity(user)
            .targetField(nga.field('name'))
            .label('Usuário'),
        nga.field('created_at', 'date').label('Criado').format('dd/MM/yyyy HH:mm:ss'),
        nga.field('updated_at', 'date').label('Atualizado').format('dd/MM/yyyy HH:mm:ss')
    ]).listActions(['edit', 'delete']);

    bloco_camiseta.creationView().fields([
        nga.field('title').label('Título')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('sub_title', 'text').label('Sub Título')
            .validation({ required: true, minlength: 3, maxlength: 500 }),
        nga.field('user_id', 'reference')
            .targetEntity(user)
            .targetField(nga.field('name'))
            .remoteComplete(true)
            .label('Usuário')
    ]);

    bloco_camiseta.editionView().fields([
        nga.field('title').label('Título')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('sub_title', 'text').label('Sub Título')
            .validation({ required: true, minlength: 3, maxlength: 500 }),
        nga.field('user_id', 'reference')
            .targetEntity(user)
            .targetField(nga.field('name'))
            .remoteComplete(true)
            .label('Usuário'),
    ]);
    admin.addEntity(bloco_camiseta)
    //termina aqui a entidade Bloco Camisetas

    //começa aqui a entidade Bloco Camisetas Destaques
    var bloco_camiseta_destaque = nga.entity('bloco-camiseta-destaques');
    bloco_camiseta_destaque.listView().fields([
        //nga.field('id', 'number'),
        nga.field('title').label('Títulos').isDetailLink(true),
        nga.field('sub_title').label('Sub Título')
            .map(function truncate(value) {
                if (!value) return '';
                return value.length > 50 ? value.substr(0, 50) + '...' : value;
            }),
        nga.field('user_id', 'reference')
            .targetEntity(user).targetField(nga.field('name')).label('Usuário'),
        nga.field('created_at', 'date').label('Criado').format('dd/MM/yyyy HH:mm:ss'),
        nga.field('updated_at', 'date').label('Atualizado').format('dd/MM/yyyy HH:mm:ss')
    ]).listActions(['edit', 'delete']);

    bloco_camiseta_destaque.creationView().fields([
        nga.field('title').label('Título')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('sub_title', 'text').label('Sub Título')
            .pinned(true)
            .validation({ required: true, minlength: 3, maxlength: 500 }),
        nga.field('user_id', 'reference')
            .targetEntity(user)
            .targetField(nga.field('name'))
            .remoteComplete(true)
            .label('Usuário')
    ]);

    bloco_camiseta_destaque.editionView().fields([
        nga.field('title').label('Título')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('sub_title', 'text').label('Sub Título')
            .validation({ required: true, minlength: 3, maxlength: 500 }),
        nga.field('user_id', 'reference')
            .targetEntity(user)
            .targetField(nga.field('name'))
            //.remoteComplete(true)
            .label('Usuário'),
        nga.field('created_at', 'datetime').label('Criando'),
        nga.field('updated_at', 'datetime').label('Atualizado')
    ]);
    admin.addEntity(bloco_camiseta_destaque)
    //termina aqui a entidade Bloco Camisetas Destaques

    //começa aqui a entidade Bloco Tecidos
    var bloco_tecido = nga.entity('bloco-tecidos');
    bloco_tecido.listView().fields([
        //nga.field('id', 'number'),
        nga.field('title').label('Títulos').isDetailLink(true),
        nga.field('sub_title').label('Sub Título')
            .map(function truncate(value) {
                if (!value) return '';
                return value.length > 50 ? value.substr(0, 50) + '...' : value;
            }),
        nga.field('user_id', 'reference')
            .targetEntity(user)
            .targetField(nga.field('name'))
            .label('Usuário'),
        nga.field('created_at', 'date').label('Criado').format('dd/MM/yyyy HH:mm:ss'),
        nga.field('updated_at', 'date').label('Atualizado').format('dd/MM/yyyy HH:mm:ss')
    ]).listActions(['edit', 'delete']);

    bloco_tecido.creationView().fields([
        nga.field('title').label('Título')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('sub_title', 'text').label('Sub Título')
            .validation({ required: true, minlength: 3, maxlength: 500 }),
        nga.field('user_id', 'reference')
            .targetEntity(user)
            .targetField(nga.field('name'))
            .remoteComplete(true)
            .label('Usuário'),
    ]);

    bloco_tecido.editionView().fields([
        nga.field('title').label('Título')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('sub_title', 'text').label('Sub Título')
            .validation({ required: true, minlength: 3, maxlength: 500 }),
        nga.field('user_id', 'reference')
            .targetEntity(user)
            .targetField(nga.field('name'))
            .remoteComplete(true)
            .label('Usuário'),
    ]);
    admin.addEntity(bloco_tecido)
    //termina aqui a entidade Bloco Tecidos

    //começa aqui a entidade Bloco Tecido Destaques
    var bloco_tecido_destaque = nga.entity('bloco-tecido-destaques');
    bloco_tecido_destaque.listView().fields([
        //nga.field('id', 'number'),
        nga.field('title').label('Títulos').isDetailLink(true),
        nga.field('sub_title').label('Sub Título')
            .map(function truncate(value) {
                if (!value) return '';
                return value.length > 50 ? value.substr(0, 50) + '...' : value;
            }),
        nga.field('user_id', 'reference')
            .targetEntity(user)
            .targetField(nga.field('name'))
            .label('Usuário'),
        nga.field('created_at', 'date').label('Criado').format('dd/MM/yyyy HH:mm:ss'),
        nga.field('updated_at', 'date').label('Atualizado').format('dd/MM/yyyy HH:mm:ss')
    ]).listActions(['edit', 'delete']);

    bloco_tecido_destaque.creationView().fields([
        nga.field('title').label('Título')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('sub_title', 'text').label('Sub Título')
            .validation({ required: true, minlength: 3, maxlength: 500 }),
        nga.field('user_id').label('Usuário')
    ]);
    bloco_tecido_destaque.editionView().fields([
        nga.field('title').label('Título')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('sub_title', 'text').label('Sub Título')
            .validation({ required: true, minlength: 3, maxlength: 500 }),
        nga.field('user_id', 'reference')
            .targetEntity(user)
            .targetField(nga.field('name'))
            .remoteComplete(true)
            .label('Usuário'),
    ]);
    admin.addEntity(bloco_tecido_destaque)
    //termina aqui a entidade Bloco Tecido Destaques


    //começa aqui a entidade Categorias Camisetas
    var categoria_camiseta = nga.entity('categorias');
    categoria_camiseta.listView().fields([
        //nga.field('id', 'number'),
        nga.field('title').label('Títulos').isDetailLink(true),
        nga.field('description').label('Descrição')
            .map(function truncate(value) {
                if (!value) return '';
                return value.length > 50 ? value.substr(0, 50) + '...' : value;
            }),
        nga.field('user_id', 'reference')
            .targetEntity(user)
            .targetField(nga.field('name'))
            .label('Usuário'),
        nga.field('created_at', 'date').label('Criado').format('dd/MM/yyyy HH:mm:ss'),
        nga.field('updated_at', 'date').label('Atualizado').format('dd/MM/yyyy HH:mm:ss')
    ]).listActions(['edit', 'delete']);

    categoria_camiseta.creationView().fields([
        nga.field('title').label('Título')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('description', 'text').label('Sub Título')
            .validation({ required: true, minlength: 3, maxlength: 500 }),
        nga.field('user_id').label('Usuário')
    ]);
    categoria_camiseta.editionView().fields([
        nga.field('title').label('Título')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('description', 'text').label('Sub Título')
            .validation({ required: true, minlength: 3, maxlength: 500 }),
        nga.field('user_id', 'reference')
            .targetEntity(user)
            .targetField(nga.field('name'))
            .remoteComplete(true)
            .label('Usuário'),
    ]);
    admin.addEntity(categoria_camiseta)
    //termina aqui a entidade Categoria Camisetas

    //começa aqui a entidade Camisetas
    var camiseta = nga.entity('camisetas');
    camiseta.listView().fields([
        //nga.field('id', 'number'),
        nga.field('name').label('Nome').isDetailLink(true),
        nga.field('description').label('Descrição')
            .map(function truncate(value) {
                if (!value) return '';
                return value.length > 50 ? value.substr(0, 50) + '...' : value;
            }),
        nga.field('info').label('Informação')
            .map(function truncate(value) {
                if (!value) return '';
                return value.length > 50 ? value.substr(0, 50) + '...' : value;
            }),
        nga.field('price', 'number').label('Preço1').format('R$ 0.00'),
        nga.field('price_sem', 'number').label('Preço2').format('R$ 0.00'),
        nga.field('active').label('Ativo'),
        nga.field('quantidade').label('Quantidade'),
        nga.field('quantidade_tamanho_p', 'number').label('P'),
        nga.field('quantidade_tamanho_m', 'number').label('M'),
        nga.field('quantidade_tamanho_g', 'number').label('G'),
        nga.field('quantidade_tamanho_gg', 'number').label('GG'),
        nga.field('quantidade_tamanho_2gg', 'number').label('2GG'),
        nga.field('quantidade_tamanho_3gg', 'number').label('3GG'),
        //nga.field('user_id', 'reference')
        //    .targetEntity(user)
        //    .targetField(nga.field('name'))
        //    .label('Usuário'),
        nga.field('created_at', 'date').label('Criado').format('dd/MM/yyyy HH:mm:ss'),
        nga.field('updated_at', 'date').label('Atualizado').format('dd/MM/yyyy HH:mm:ss')
    ]).listActions(['edit', 'delete']);

    camiseta.creationView().fields([
        nga.field('name').label('Título')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('description', 'text').label('Sub Título')
            .validation({ required: true, minlength: 3, maxlength: 500 }),
        nga.field('user_id').label('Usuário')
    ]);
    camiseta.editionView().fields([
        nga.field('name').label('Nome')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('description', 'text').label('Descrição')
            .validation({ required: true, minlength: 3, maxlength: 500 }),
        nga.field('info', 'text').label('Informação')
            .validation({ required: true, minlength: 3, maxlength: 500 }),
        nga.field('price').label('Preço com'),
        nga.field('price_sem').label('Preço sem'),
        nga.field('quantidade_tamanho_p', 'number').label('Quantidade P'),
        nga.field('quantidade_tamanho_m', 'number').label('Quantidade M'),
        nga.field('quantidade_tamanho_g', 'number').label('Quantidade G'),
        nga.field('quantidade_tamanho_gg', 'number').label('Quantidade GG'),
        nga.field('quantidade_tamanho_2gg', 'number').label('Quantidade 2GG'),
        nga.field('quantidade_tamanho_3gg', 'number').label('Quantidade 3GG'),
        nga.field('quantidade', 'number').label('Quantidade Total'),
        nga.field('active' , 'boolean').label('Ativo')
            .choices([
                { value: null, label: 'nulo' },
                { value: true, label: 'ativo' },
                { value: false, label: 'desativado' }
            ])
        //nga.field('user_id', 'reference')
        //    .targetEntity(user)
        //    .targetField(nga.field('name'))
        //    .remoteComplete(true)
        //    .label('Usuário'),
    ]);
    admin.addEntity(camiseta)
    //termina aqui a entidade Categoria Camisetas

    //começa aqui a entidade Camisetas Genero
    var genero = nga.entity('generos');
    genero.listView().fields([
        //nga.field('id', 'number'),
        nga.field('name').label('Nome').isDetailLink(true),
        nga.field('description').label('Descrição')
            .map(function truncate(value) {
                if (!value) return '';
                return value.length > 50 ? value.substr(0, 50) + '...' : value;
            }),
        //nga.field('user_id', 'reference')
        //    .targetEntity(user)
        //    .targetField(nga.field('name'))
        //    .label('Usuário'),
        nga.field('created_at', 'date').label('Criado').format('dd/MM/yyyy HH:mm:ss'),
        nga.field('updated_at', 'date').label('Atualizado').format('dd/MM/yyyy HH:mm:ss')
    ]).listActions(['edit', 'delete']);

    genero.creationView().fields([
        nga.field('name').label('Nome')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('description', 'text').label('Descrição')
            .validation({ required: true, minlength: 3, maxlength: 500 })
    ]);
    genero.editionView().fields([
        nga.field('name').label('Nome')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('description', 'text').label('Sub Título')
            .validation({ required: true, minlength: 3, maxlength: 500 }),
        //nga.field('user_id', 'reference')
        //    .targetEntity(user)
        //    .targetField(nga.field('name'))
        //    .remoteComplete(true)
        //    .label('Usuário'),
    ]);
    admin.addEntity(genero)
    //termina aqui a entidade Camisetas Genero

    //começa aqui a entidade Camisetas cor
    var cor = nga.entity('cors');
    cor.listView().fields([
        //nga.field('id', 'number'),
        nga.field('name').label('Nome').isDetailLink(true),
        nga.field('rgb').label('Cor RGB'),
        //nga.field('user_id', 'reference')
        //    .targetEntity(user)
        //    .targetField(nga.field('name'))
        //    .label('Usuário'),
        nga.field('created_at', 'date').label('Criado').format('dd/MM/yyyy HH:mm:ss'),
        nga.field('updated_at', 'date').label('Atualizado').format('dd/MM/yyyy HH:mm:ss')
    ]).listActions(['edit', 'delete']);

    cor.creationView().fields([
        nga.field('name').label('Nome')
            .validation({ required: true, minlength: 3, maxlength: 20 }),
        nga.field('rgb', 'text').label('Cor RGB')
            .validation({ required: true, minlength: 3, maxlength: 50 })
    ]);
    cor.editionView().fields([
        nga.field('name').label('Nome')
            .validation({ required: true, minlength: 3, maxlength: 100 }),
        nga.field('rgb').label('Cor RGB')
            .validation({ required: true, minlength: 3, maxlength: 500 }),
        //nga.field('user_id', 'reference')
        //    .targetEntity(user)
        //    .targetField(nga.field('name'))
        //    .remoteComplete(true)
        //    .label('Usuário'),
    ]);
    admin.addEntity(cor)
    //termina aqui a entidade Camisetas cor

    //começa aqui a entidade Camisetas cor
    var tamanho = nga.entity('tamanhos');
    tamanho.listView().fields([
        nga.field('name').label('Nome').isDetailLink(true),
        nga.field('created_at', 'date').label('Criado').format('dd/MM/yyyy HH:mm:ss'),
        nga.field('updated_at', 'date').label('Atualizado').format('dd/MM/yyyy HH:mm:ss')
    ]).listActions(['edit', 'delete']);

    tamanho.creationView().fields([
        nga.field('name').label('Nome')
            .validation({ required: true, minlength: 1, maxlength: 10 })
    ]);
    tamanho.editionView().fields([
        nga.field('name').label('Nome')
            .validation({ required: true, minlength: 1, maxlength: 10 })
    ]);
    admin.addEntity(tamanho)
    //termina aqui a entidade Camisetas cor

    //começa aqui a entidade Camisetas Silk
    var silk = nga.entity('silks');
    silk.listView().fields([
        nga.field('name').label('Nome').isDetailLink(true),
        nga.field('description', 'text').label('Descrição')
            .map(function truncate(value) {
            if (!value) return '';
            return value.length > 50 ? value.substr(0, 50) + '...' : value;
        }),
        nga.field('medida').label('Medidas'),
        nga.field('price_un_com', 'number').label('Preço_C').format('$0.00'),
        nga.field('price_un_sem', 'number').label('Preço_S').format('$0.00'),
        nga.field('created_at', 'date').label('Criado').format('dd/MM/yyyy HH:mm:ss'),
        nga.field('updated_at', 'date').label('Atualizado').format('dd/MM/yyyy HH:mm:ss')
    ]).listActions(['edit', 'delete']);

    silk.creationView().fields([
        nga.field('name').label('Nome')
            .validation({ required: true, minlength: 1, maxlength: 10 }),
        nga.field('description').label('Descrição'),
        nga.field('medida').label('Medidas'),
        nga.field('price_un_com').label('Preço com'),
        nga.field('price_un_sem').label('Preço sem')
    ]);
    silk.editionView().fields([
        nga.field('name').label('Nome'),
        nga.field('description').label('Descrição'),
        nga.field('medida').label('Medidas'),
        nga.field('price_un_com', 'float').label('Preço com'),
        nga.field('price_un_sem', 'float').label('Preço sem'),
        nga.field('updated_at', 'datetime').label('Atualizado')
    ]);
    admin.addEntity(silk)
    //termina aqui a entidade Camisetas Silk

    //começa aqui a entidade Tecidos
    var tecido = nga.entity('tecidos');
    tecido.listView().fields([
        nga.field('name').label('Nome').isDetailLink(true),
        nga.field('description').label('Descrição')
            .map(function truncate(value) {
                if (!value) return '';
                return value.length > 50 ? value.substr(0, 50) + '...' : value;
            }),
        nga.field('info').label('Informação')
            .map(function truncate(value) {
                if (!value) return '';
                return value.length > 50 ? value.substr(0, 50) + '...' : value;
            }),
        nga.field('price_com', 'number').label('Preço_C').format('$0.00'),
        nga.field('price_sem', 'number').label('Preço_S').format('$0.00'),
        nga.field('created_at', 'date').label('Criado').format('dd/MM/yyyy HH:mm:ss'),
        nga.field('updated_at', 'date').label('Atualizado').format('dd/MM/yyyy HH:mm:ss')
    ]).listActions(['edit', 'delete']);

    tecido.creationView().fields([
        nga.field('name').label('Nome')
            .validation({ required: true, minlength: 1, maxlength: 10 }),
        nga.field('description').label('Descrição'),
        nga.field('info').label('Informação'),
        nga.field('medida').label('Medidas'),
        nga.field('price_com').label('Preço com'),
        nga.field('price_sem').label('Preço sem')
    ]);
    tecido.editionView().fields([
        nga.field('name').label('Nome')
            .validation({ required: true, minlength: 1, maxlength: 10 }),
        nga.field('description', 'text').label('Descrição'),
        nga.field('info', 'text').label('Informação'),
        nga.field('price_com').label('Preço com'),
        nga.field('price_sem').label('Preço sem')
    ]);
    admin.addEntity(tecido)
    //termina aqui a entidade Tecidos

    //começa aqui a entidade Amostra Tecidos
    var tecido_amostra = nga.entity('tecido-amostras');
    tecido_amostra.listView().fields([
        nga.field('name').label('Nome').isDetailLink(true),
        nga.field('description').label('Descrição')
            .map(function truncate(value) {
                if (!value) return '';
                return value.length > 50 ? value.substr(0, 50) + '...' : value;
            }),
        nga.field('medidas').label('Medida'),
        nga.field('price', 'number').label('Preço').format('$0.00'),
        nga.field('created_at', 'date').label('Criado').format('dd/MM/yyyy HH:mm:ss'),
        nga.field('updated_at', 'date').label('Atualizado').format('dd/MM/yyyy HH:mm:ss')
    ]).listActions(['edit', 'delete']);

    tecido_amostra.creationView().fields([
        nga.field('name').label('Nome')
            .validation({ required: true, minlength: 1, maxlength: 10 }),
        nga.field('description', 'text').label('Descrição'),
        nga.field('medidas').label('Medidas'),
        nga.field('price').label('Preço sem')
    ]);
    tecido_amostra.editionView().fields([
        nga.field('name').label('Nome')
            .validation({ required: true, minlength: 1, maxlength: 10 }),
        nga.field('description', 'text').label('Descrição'),
        nga.field('medidas').label('Medida'),
        nga.field('price').label('Preço')
    ]);
    admin.addEntity(tecido_amostra)
    //termina aqui a entidade Amostra Tecidos

    //começa aqui a entidade Categoria Tecidos
    var categoria_tecido = nga.entity('categoria-tecidos');
    categoria_tecido.listView().fields([
        nga.field('title').label('Título').isDetailLink(true),
        nga.field('description').label('Descrição')
            .map(function truncate(value) {
                if (!value) return '';
                return value.length > 50 ? value.substr(0, 50) + '...' : value;
            }),
        nga.field('created_at', 'date').label('Criado').format('dd/MM/yyyy HH:mm:ss'),
        nga.field('updated_at', 'date').label('Atualizado').format('dd/MM/yyyy HH:mm:ss')
    ]).listActions(['edit', 'delete']);

    categoria_tecido.creationView().fields([
        nga.field('title').label('Título')
            .validation({ required: true, minlength: 1, maxlength: 10 }),
        nga.field('description', 'text').label('Descrição')
    ]);
    categoria_tecido.editionView().fields([
        nga.field('title').label('Título')
            .validation({ required: true, minlength: 1, maxlength: 10 }),
        nga.field('description', 'text').label('Descrição')
    ]);
    admin.addEntity(categoria_tecido)
    //termina aqui a entidade Categoria Tecidos

    //começa aqui a entidade Tags
    var tag = nga.entity('tags');
    tag.listView().fields([
        nga.field('id', 'number'),
        nga.field('title').label('Títulos').isDetailLink(true),
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

    //começa aqui a entidade Horários
    var horario = nga.entity('horarios');
    horario.listView().fields([
        nga.field('atendimento').label('Atendimento').isDetailLink(true),
        nga.field('telefone').label('Telefone'),
        nga.field('entrega').label('Entregamos'),
        nga.field('created_at', 'date').label('Criado').format('dd/MM/yyyy HH:mm:ss'),
        nga.field('updated_at', 'date').label('Atualizado').format('dd/MM/yyyy HH:mm:ss')
    ]).listActions(['edit', 'delete']);

    horario.creationView().fields([
        nga.field('atendimento').label('Atendimento')
            .validation({ required: true, minlength: 1, maxlength: 100 }),
        nga.field('telefone', 'text').label('Telefone'),
        nga.field('entrega').label('Entregamos')
    ]);
    horario.editionView().fields([
        nga.field('atendimento').label('Atendimento')
            .validation({ required: true, minlength: 1, maxlength: 100 }),
        nga.field('telefone').label('Telefone'),
        nga.field('entrega').label('Entregamos')
    ]);
    admin.addEntity(horario)
    //termina aqui a entidade Horários

    //começa aqui a entidade Menus
    var menu = nga.entity('menus');
    menu.listView().fields([
        nga.field('title').label('Título').isDetailLink(true),
        nga.field('url').label('URL - não mexa'),
        nga.field('description').label('Descrição')
            .map(function truncate(value) {
                if (!value) return '';
                return value.length > 50 ? value.substr(0, 50) + '...' : value;
            }),
        nga.field('alt').label('Alt Link')
            .map(function truncate(value) {
                if (!value) return '';
                return value.length > 50 ? value.substr(0, 50) + '...' : value;
            }),
        nga.field('fafa').label('Fa Fa'),
        nga.field('created_at', 'date').label('Criado').format('dd/MM/yyyy HH:mm:ss'),
        nga.field('updated_at', 'date').label('Atualizado').format('dd/MM/yyyy HH:mm:ss')
    ]).listActions(['edit', 'delete']);

    menu.creationView().fields([
        nga.field('title').label('Título'),
        nga.field('url').label('URL'),
        nga.field('description', 'text').label('Descrição'),
        nga.field('alt', 'text').label('Alt Link'),
        nga.field('fafa').label('Fa Fa'),
    ]);
    menu.editionView().fields([
        nga.field('title').label('Título'),
        nga.field('url').label('URL'),
        nga.field('description', 'text').label('Descrição'),
        nga.field('alt', 'text').label('Alt Link'),
        nga.field('fafa').label('Fa Fa'),
    ]);
    admin.addEntity(menu)
    //termina aqui a entidade Menus

    //começa aqui a entidade Faqs
    var faq = nga.entity('faqs');
    faq.listView().fields([
        nga.field('title').label('Título').isDetailLink(true),
        nga.field('description').label('Descrição')
            .map(function truncate(value) {
                if (!value) return '';
                return value.length > 50 ? value.substr(0, 50) + '...' : value;
            }),
        nga.field('created_at', 'date').label('Criado').format('dd/MM/yyyy HH:mm:ss'),
        nga.field('updated_at', 'date').label('Atualizado').format('dd/MM/yyyy HH:mm:ss')
    ]).listActions(['edit', 'delete']);

    faq.creationView().fields([
        nga.field('title').label('Título'),
        nga.field('description', 'text').label('Descrição')
    ]);
    faq.editionView().fields([
        nga.field('title', 'text').label('Título'),
        nga.field('description', 'text').label('Descrição'),
    ]);
    admin.addEntity(faq)
    //termina aqui a entidade Faqs

    //começa aqui a entidade Categoria Faqs
    var categoria_faq = nga.entity('categoria-faqs');
    categoria_faq.listView().fields([
        nga.field('title').label('Título').isDetailLink(true),
        nga.field('description').label('Descrição')
            .map(function truncate(value) {
                if (!value) return '';
                return value.length > 50 ? value.substr(0, 50) + '...' : value;
            }),
        nga.field('created_at', 'date').label('Criado').format('dd/MM/yyyy HH:mm:ss'),
        nga.field('updated_at', 'date').label('Atualizado').format('dd/MM/yyyy HH:mm:ss')
    ]).listActions(['edit', 'delete']);

    categoria_faq.creationView().fields([
        nga.field('title').label('Título'),
        nga.field('description').label('Descrição')
    ]);
    categoria_faq.editionView().fields([
        nga.field('title').label('Título'),
        nga.field('description').label('Descrição')
    ]);
    admin.addEntity(categoria_faq)
    //termina aqui a entidade Categoria Faqs

    //começa aqui a entidade Sobre Nos
    var sobre = nga.entity('sobre-nos');
    sobre.listView().fields([
        nga.field('titulo').label('Título').isDetailLink(true),
        nga.field('description').label('Descrição')
            .map(function truncate(value) {
                if (!value) return '';
                return value.length > 50 ? value.substr(0, 50) + '...' : value;
            }),
        nga.field('created_at', 'date').label('Criado').format('dd/MM/yyyy HH:mm:ss'),
        nga.field('updated_at', 'date').label('Atualizado').format('dd/MM/yyyy HH:mm:ss')
    ]).listActions(['edit', 'delete']);

    sobre.creationView().fields([
        nga.field('titulo').label('Título'),
        nga.field('description', 'text').label('Descrição')
    ]);
    sobre.editionView().fields([
        nga.field('titulo').label('Título'),
        nga.field('description', 'text').label('Descrição')
    ]);
    admin.addEntity(sobre)
    //termina aqui a entidade Sobre Nos

    admin.menu(nga.menu()

            //começa o menu Usuários
            .addChild(nga.menu().title('Usuários')
                .addChild(nga.menu(user).title('Admin').icon('<span class="glyphicon glyphicon-align-center"></span>'))
                //.addChild(nga.menu(categoria_blog).title('Categorias Posts').icon('<span class="glyphicon glyphicon-align-center"></span>'))
                //.addChild(nga.menu(comment).title('Coméntarios').icon('<span class="glyphicon glyphicon-align-center"></span>'))
        )//termina menu Usuários

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
             .addChild(nga.menu(bloco_tecido).title('Bloco Tecidos').icon('<span class="glyphicon glyphicon-align-center"></span>'))
             .addChild(nga.menu(bloco_tecido_destaque).title('Bloco Tecido Destaque').icon('<span class="glyphicon glyphicon-align-center"></span>'))
        )//termina menu Home

        //começa o menu Camisetas
        .addChild(nga.menu().title('Camisetas')
             .addChild(nga.menu(categoria_camiseta).title('Categorias').icon('<span class="glyphicon glyphicon-align-center"></span>'))
             .addChild(nga.menu(camiseta).title('Camisetas').icon('<span class="glyphicon glyphicon-align-center"></span>'))
             .addChild(nga.menu(genero).title('Generos').icon('<span class="glyphicon glyphicon-align-center"></span>'))
             .addChild(nga.menu(cor).title('Cores').icon('<span class="glyphicon glyphicon-align-center"></span>'))
             .addChild(nga.menu(tamanho).title('Tamanhos').icon('<span class="glyphicon glyphicon-align-center"></span>'))
             .addChild(nga.menu(silk).title('Silks').icon('<span class="glyphicon glyphicon-align-center"></span>'))
        )//termina menu Camisetas

        //começa o menu Tecidos
        .addChild(nga.menu().title('Tecidos')
             .addChild(nga.menu(tecido).title('Tecidos').icon('<span class="glyphicon glyphicon-tags"></span>'))
             .addChild(nga.menu(tecido_amostra).title('Amostras').icon('<span class="glyphicon glyphicon-tags"></span>'))
             .addChild(nga.menu(categoria_tecido).title('Categoria Tecidos').icon('<span class="glyphicon glyphicon-tags"></span>'))
        )//termina menu Tecidos

        //começa o menu Outros
          .addChild(nga.menu().title('Outros')
              .addChild(nga.menu(tag).title('Lista de Tags').icon('<span class="glyphicon glyphicon-tags"></span>'))
              .addChild(nga.menu(horario).title('Horários').icon('<span class="glyphicon glyphicon-tags"></span>'))
              .addChild(nga.menu(menu).title('Menus').icon('<span class="glyphicon glyphicon-tags"></span>'))
              .addChild(nga.menu(faq).title('Faqs').icon('<span class="glyphicon glyphicon-tags"></span>'))
              .addChild(nga.menu(categoria_faq).title('Categoria Faqs').icon('<span class="glyphicon glyphicon-tags"></span>'))
              .addChild(nga.menu(sobre).title('Sobre Nos').icon('<span class="glyphicon glyphicon-tags"></span>'))
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