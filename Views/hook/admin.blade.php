@push('head')
<script type="text/ng-template" id="news.html">
    <div ui-view>
        <div ng-controller="NewsCtrl">
            <div class="container-fluid">
                <div vns-table="tableParams"></div>
            </div>
            <div class="content-btn">
                <button ng-disabled="isLoading" class="btn btn-default" ng-click="tableParams.reload()"><i class="fa fa-refresh fa-fw"></i> {{ __('Reload') }}</button>
                <button class="btn btn-success" ng-click="new()"><i class="fa fa-file-o fa-fw"></i> {{ __('Add news') }}</button>
            </div>
        </div>
    </div>
</script>
<script type="text/ng-template" id="news/new.html">
    <div class="modal-header">
        <h4 class="modal-title">{{ __('Add news') }}</h4>
    </div>
    <div class="modal-body">
        <table class="table table-striped table-bordered" style="margin-bottom: 0">
            <colgroup>
                <col width="25%">
                <col>
            </colgroup>
            <tbody>
            <tr>
                <td>{{__('Name')}}</td>
                <td>
                    <input class="form-control" type="text" ng-model="news.name">
                </td>
            </tr>
            <tr>
                <td>{{__('Slug')}}</td>
                <td>
                    <input class="form-control" type="text" input-slug="news.name" ng-model="news.slug">
                </td>
            </tr>
            <tr>
                <td>{{__('Title')}}</td>
                <td>
                    <input class="form-control" type="text" input-copy="news.name" ng-model="news.title">
                </td>
            </tr>
            <tr>
                <td>{{__('Description')}}</td>
                <td>
                    <textarea class="form-control" ng-model="news.excerpt"></textarea>
                </td>
            </tr> 
            <tr>
                <td>{{__('Image')}}</td>
                <td>
                    <vns-media-input ng-model="news.image" media-config="{single:true}"/>
                </td>
            </tr>
            <tr>
                <td>{{__('Status')}}</td>
                <td>
                    <div class="btn-group">
                        <label class="btn btn-default" ng-model="news.status" uib-btn-radio="true">{{__('Enabled')}}</label>
                        <label class="btn btn-default" ng-model="news.status" uib-btn-radio="false">{{__('Disabled')}}</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>{{__('Comment')}}</td>
                <td>
                    <div class="btn-group">
                        <label class="btn btn-default" ng-model="news.comment" uib-btn-radio="true">{{__('Enabled')}}</label>
                        <label class="btn btn-default" ng-model="news.comment" uib-btn-radio="false">{{__('Disabled')}}</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>{{ __('Category') }}</td>
                <td>
                    <dropdown-select ng-model="news.parent" options="categories" empty-label="{{__('Select category')}}"></dropdown-select>
                </td>
            </tr>
            <tr>
                <td>{{__('Content')}}</td>
                <td>
                    <textarea ui-tinymce="$root.tinymceOptions" ng-model="news.content"></textarea>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" ng-click="save()">{{__('Save')}}</button>
        <button type="button" class="btn btn-primary" ng-click="close()">{{__('Close')}}</button>
    </div>
</script>
<script type="text/ng-template" id="news/edit.html">
    <div class="modal-header">
        <h4 class="modal-title">{{ __('Edit') }}: @{{name}}</h4>
    </div>
    <div class="modal-body">
        <table class="table table-striped table-bordered" style="margin-bottom: 0">
            <colgroup>
                <col width="25%">
                <col>
            </colgroup>
            <tbody>
            <tr>
                <td>{{__('Name')}}</td>
                <td>
                    <input class="form-control" type="text" ng-model="news.name">
                </td>
            </tr>
            <tr>
                <td>{{__('Slug')}}</td>
                <td>
                    <input class="form-control" type="text" ng-model="news.slug">
                </td>
            </tr>
            <tr>
                <td>{{__('Title')}}</td>
                <td>
                    <input class="form-control" type="text" ng-model="news.title">
                </td>
            </tr>
            <tr>
                <td>{{__('Description')}}</td>
                <td>
                    <textarea class="form-control" ng-model="news.excerpt"></textarea>
                </td>
            </tr>
            <tr>
                <td>{{__('Image')}}</td>
                <td>
                    <vns-media-input ng-model="news.image" media-config="{single:true}"/>
                </td>
            </tr>
            <tr>
            <tr>
                <td>{{__('Status')}}</td>
                <td>
                    <div class="btn-group">
                        <label class="btn btn-default" ng-model="news.status" uib-btn-radio="true">{{__('Enabled')}}</label>
                        <label class="btn btn-default" ng-model="news.status" uib-btn-radio="false">{{__('Disabled')}}</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>{{__('Comment')}}</td>
                <td>
                    <div class="btn-group">
                        <label class="btn btn-default" ng-model="news.comment" uib-btn-radio="true">{{__('Enabled')}}</label>
                        <label class="btn btn-default" ng-model="news.comment" uib-btn-radio="false">{{__('Disabled')}}</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>{{__('Category')}}</td>
                <td>
                    <dropdown-select ng-model="news.parent" options="categories" empty-label="{{__('Select category')}}"></dropdown-select>
                </td>
            </tr>
            <tr>
                <td>{{__('Content')}}</td>
                <td>
                    <textarea ui-tinymce="$root.tinymceOptions" ng-model="news.content"></textarea>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" ng-click="save()">{{__('Save')}}</button>
        <button type="button" class="btn btn-primary" ng-click="close()">{{__('Close')}}</button>
    </div>
</script>
<script type="text/ng-template" id="news/category.html">
    <div ng-controller="NewsCatCtrl">
        <div class="container-fluid">
            <div vns-table="tableParams"></div>
        </div>
        <div class="content-btn">
            <button ng-disabled="isLoading" class="btn btn-default" ng-click="tableParams.reload()"><i class="fa fa-refresh fa-fw"></i> {{ __('Reload') }}</button>
            <button class="btn btn-success" ng-click="new()"><i class="fa fa-file-o fa-fw"></i> {{ __('New category') }}</button>
        </div>
    </div>
</script>
<script type="text/ng-template" id="news/category/new.html">
    <div class="modal-header">
        <h4 class="modal-title">{{ __('New category') }}</h4>
    </div>
    <div class="modal-body">
        <table class="table table-striped table-bordered" style="margin-bottom: 0">
            <colgroup>
                <col width="25%">
                <col>
            </colgroup>
            <tbody>
            <tr>
                <td>{{__('Name')}}</td>
                <td>
                    <input class="form-control" type="text" ng-model="category.name">
                </td>
            </tr>
            <tr>
                <td>{{__('Slug')}}</td>
                <td>
                    <input class="form-control" type="text" input-slug="category.name" ng-model="category.slug">
                </td>
            </tr>
            <tr>
                <td>{{__('Title')}}</td>
                <td>
                    <input class="form-control" type="text" input-copy="category.name" ng-model="category.title">
                </td>
            </tr>
            <tr>
                <td>{{__('Description')}}</td>
                <td>
                    <textarea class="form-control" ng-model="category.description"></textarea>
                </td>
            </tr>
            <tr>
                <td>{{__('Image')}}</td>
                <td>
                    <vns-media-input ng-model="category.image" media-config="{single:true}"/>
                </td>
            </tr>
            <tr>
                <td>{{__('Status')}}</td>
                <td>
                    <div class="btn-group">
                        <label class="btn btn-default" ng-model="category.status" uib-btn-radio="true">{{__('Enabled')}}</label>
                        <label class="btn btn-default" ng-model="category.status" uib-btn-radio="false">{{__('Disabled')}}</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>{{__('Parent category')}}</td>
                <td>
                    <dropdown-select ng-model="category.parent" options="categories" empty-label="{{__('Root category')}}"></dropdown-select>
                </td>
            </tr>
            <tr>
                <td>{{__('Content')}}</td>
                <td>
                    <textarea ui-tinymce="$root.tinymceOptions" ng-model="category.content"></textarea>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" ng-click="save()">{{__('Save')}}</button>
        <button type="button" class="btn btn-primary" ng-click="close()">{{__('Close')}}</button>
    </div>
</script>
<script type="text/ng-template" id="news/category/edit.html">
    <div class="modal-header">
        <h4 class="modal-title">{{ __('Edit category') }}: @{{name}}</h4>
    </div>
    <div class="modal-body">
        <table class="table table-striped table-bordered" style="margin-bottom: 0">
            <colgroup>
                <col width="25%">
                <col>
            </colgroup>
            <tbody>
            <tr>
                <td>{{__('Name')}}</td>
                <td>
                    <input class="form-control" type="text" ng-model="category.name">
                </td>
            </tr>
            <tr>
                <td>{{__('Slug')}}</td>
                <td>
                    <input class="form-control" type="text" ng-model="category.slug">
                </td>
            </tr>
            <tr>
                <td>{{__('Title')}}</td>
                <td>
                    <input class="form-control" type="text" ng-model="category.title">
                </td>
            </tr>
            <tr>
                <td>{{__('Description')}}</td>
                <td>
                    <textarea class="form-control" ng-model="category.description"></textarea>
                </td>
            </tr>
            <tr>
                <td>{{__('Image')}}</td>
                <td>
                    <vns-media-input ng-model="category.image" media-config="{single:true}"/>
                </td>
            </tr>
            <tr>
                <td>{{__('Status')}}</td>
                <td>
                    <div class="btn-group">
                        <label class="btn btn-default" ng-model="category.status" uib-btn-radio="true">{{__('Enabled')}}</label>
                        <label class="btn btn-default" ng-model="category.status" uib-btn-radio="false">{{__('Disabled')}}</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>{{__('Parent')}}</td>
                <td>
                    <dropdown-select ng-model="category.parent" options="categories" empty-label="{{__('Root category')}}"></dropdown-select>
                </td>
            </tr>
            <tr>
                <td>{{__('Content')}}</td>
                <td>
                    <textarea ui-tinymce="$root.tinymceOptions" ng-model="category.content"></textarea>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" ng-click="save()">{{__('Save')}}</button>
        <button type="button" class="btn btn-primary" ng-click="close()">{{__('Close')}}</button>
    </div>
</script>
<script type="text/javascript">
    VnSapp.controller('NewsCtrl', function ($rootScope, $scope, $uibModal, $filter, vnsTableParams, $resource, $state, Dialog, Notification) {
        if($state.current.name == 'root.news') {
            $rootScope.siteTitle = '{!!__('All news')!!}';

            var News = $resource(API_URL + '/news/:id', { id: '@id' }, {
                update: {
                    method: 'PUT'
                }
            });
            var Category = $resource(API_URL + '/news/category/:id', { id: '@id' }, {
                update: {
                    method: 'PUT'
                }
            });

            var tableParams = $scope.tableParams = new vnsTableParams({
                columns: {
                    id: {
                        label: '{{__('Id')}}',
                        type: 'fixed',
                        filter: 'number',
                        sortable: true
                    },
                    image: {
                        label: '{{__('Image')}}',
                        type: 'image',
                        format: function (value) {
                            return $filter('parseImage')(value);
                        }
                    },
                    name: {
                        label: '{{__('Name')}}',
                        filter: 'text',
                        sortable: true
                    },
                    author: {
                        label: '{{__('Author')}}',
                        filter: 'text'
                    },
                    created_at: {
                        label: '{{__('Created at')}}',
                        type: 'datetime'
                    },
                    status: {
                        label: '{{__('Status')}}',
                        type: 'status',
                        filter: 'status',
                        action: function (row) {
                            $scope.toggleStatus(row);
                        }
                    }
                },
                actions: [
                    {
                        label: '{{__('View')}}',
                        icon: 'fa fa-eye fa-fw',
                        callback: function (row) {
                            $rootScope.viewPost(row);
                        }
                    },
                    {
                        label: '{{__('Edit')}}',
                        icon: 'fa fa-pencil fa-fw',
                        callback: function (row) {
                            $scope.edit(row);
                        }
                    },
                    {
                        label: '{{__('Copy url')}}',
                        icon: 'fa fa-link fa-fw',
                        callback: function (row) {
                            $rootScope.postUrl(row)
                        }
                    },
                    'divider',
                    {
                        label: '{{__('Delete')}}',
                        icon: 'fa fa-trash-o fa-fw',
                        callback: function (row) {
                            $scope.delete(row);
                        }
                    }
                ],
                getData: function (params) {
                    return News.query(params.url(), function (data, headers) {
                        params.setTotal(headers('total'));
                        return data;
                    });
                }
            });

            $scope.edit = function (row) {
                News.get({id: row.id}, function(data) {
                    $uibModal.open({
                        animation: true,
                        templateUrl: 'news/edit.html',
                        controller: function ($scope, $uibModalInstance) {
                            $scope.news = data;
                            $scope.name = angular.copy(data.name);
                            $scope.categories = [];
                            Category.query(function(categories) {
                                $scope.categories = categories;
                            });
                            $scope.save = function () {
                                var $news = angular.copy($scope.news);
                                $news.$update(function (res) {
                                    row.name = angular.copy($scope.news.name);
                                    row.slug = angular.copy($scope.news.slug);
                                    $uibModalInstance.dismiss('close');
                                    Notification.success('{{__('Saved successfully')}}');
                                }, function (xhr) {
                                    if (xhr.status == 422) {
                                        var validatorError = [];
                                        for (key in xhr.data) {
                                            validatorError.push(key + ': ' + (typeof xhr.data[key] =='string'?xhr.data[key]:xhr.data[key][0]));
                                        }
                                        Notification.error(validatorError.join('<br>'));
                                    }
                                });
                            };
                            $scope.close = function () {
                                $uibModalInstance.dismiss('close');
                            };
                        },
                        backdrop: 'static',
                        windowClass: 'modal-full'
                    });
                });

            };
            $scope.new = function () {
                $uibModal.open({
                    animation: true,
                    templateUrl: 'news/new.html',
                    controller: function ($scope, $uibModalInstance) {
                        $scope.news = {
                            name: '',
                            slug: '',
                            title: '',
                            excerpt: '',
                            parent: null,
                            status: true,
                            comment: false,
                            image: null,
                            content: ''
                        };
                        $scope.categories = [];
                        Category.query(function(categories) {
                            $scope.categories = categories;
                        });

                        $scope.save = function () {
                            var $news = new News($scope.news);
                            $news.$save(function (res) {
                                tableParams.reload();
                                $uibModalInstance.dismiss('close');
                                Notification.success('{{__('Saved successfully')}}');
                            }, function (xhr) {
                                if (xhr.status == 422) {
                                    var validatorError = [];
                                    for (key in xhr.data) {
                                        validatorError.push(key + ': ' + (typeof xhr.data[key] =='string'?xhr.data[key]:xhr.data[key][0]));
                                    }
                                    Notification.error(validatorError.join('<br>'));
                                }
                            });
                        };
                        $scope.close = function () {
                            $uibModalInstance.dismiss('close');
                        };
                    },
                    backdrop: 'static',
                    windowClass: 'modal-full'
                });
            };
            $scope.delete = function (row) {
                Dialog.confirm(__('Are you sure you want to delete <b>:name</b>?', {name: row.name}))
                    .result.then(function () {
                    row.$delete(function (res) {
                        if (res == false) {
                            Notification.error('{{__('Delete failed')}}');
                        } else {
                            tableParams.reload();
                            Notification.success('{{__('Delete successfully')}}');
                        }
                    });
                });
            };
            $scope.toggleStatus = function (row) {
                var $news = angular.copy(row);
                $news.status = !row.status;
                $news.name = undefined;
                $news.$update(function (res) {
                    row.status = !row.status;
                    Notification.success('{{__('Saved successfully')}}');
                }, function (xhr) {
                    if (xhr.status == 422) {
                        var validatorError = [];
                        for (key in xhr.data) {
                            validatorError.push(key + ': ' + (typeof xhr.data[key] == 'string' ? xhr.data[key] : xhr.data[key][0]));
                        }
                        Notification.error(validatorError.join('<br>'));
                    }
                });
            };
        }
    });

    VnSapp.controller('NewsCatCtrl', function ($rootScope, $scope, $uibModal, vnsTableParams, $resource, Dialog, Notification) {
        $rootScope.siteTitle = '{!!__('Category')!!}';

        var Category = $resource(API_URL + '/news/category/:id', { id: '@id' }, {
            update: {
                method: 'PUT'
            }
        });

        var tableParams = $scope.tableParams = new vnsTableParams({
            columns: {
                id: {
                    label: '{{__('Id')}}',
                    type: 'fixed',
                    dragShow: true
                },
                name: {
                    label: '{{__('Name')}}',
                    dragShow: true
                },
                slug: {
                    label: '{{__('Url')}}'
                },
                order: {
                    label: '{{__('Order')}}',
                    order: API_URL + '/news/category/sort'
                },
                status: {
                    label: '{{__('Status')}}',
                    type: 'status'
                }
            },
            actions: [
                {
                    label: '{{__('View')}}',
                    icon: 'fa fa-eye fa-fw',
                    callback: function (row) {
                        $rootScope.viewCat(row);
                    }
                },
                {
                    label: '{{__('Edit')}}',
                    icon: 'fa fa-pencil fa-fw',
                    callback: function (row) {
                        $scope.edit(row);
                    }
                },
                {
                    label: '{{__('Copy url')}}',
                    icon: 'fa fa-link fa-fw',
                    callback: function (row) {
                        $rootScope.catUrl(row)
                    }
                },
                'divider',
                {
                    label: '{{__('Delete')}}',
                    icon: 'fa fa-trash-o fa-fw',
                    callback: function (row) {
                        $scope.delete(row);
                    }
                }
            ],
            breadcrumb: {
                root: {id: 0, name: '{{__('Root category')}}'}
            },
            getData: function (params) {
                return Category.query(params.url(), function (data) {
                    return data;
                });
            }
        });

        $scope.view = function (row) {
            $scope.tableParams.breadcrumbAdd(row);
        };

        $scope.toggleStatus = function (row) {
            var $category = angular.copy(row);
            $category.status = !row.status;
            $category.$update(function (res) {
                row.status = !row.status;
                Notification.success('{{__('Saved successfully')}}');
            }, function (xhr) {
                if (xhr.status == 422) {
                    var validatorError = [];
                    for (key in xhr.data) {
                        validatorError.push(key + ': ' + (typeof xhr.data[key] == 'string' ? xhr.data[key] : xhr.data[key][0]));
                    }
                    Notification.error(validatorError.join('<br>'));
                }
            });
        };

        $scope.new = function () {
            $uibModal.open({
                animation: true,
                templateUrl: 'news/category/new.html',
                controller: function ($scope, $uibModalInstance) {
                    $scope.category = {
                        name: '',
                        slug: '',
                        title: '',
                        image: null,
                        description: '',
                        content: '',
                        parent: tableParams.breadcrumbLastKey(),
                        status: true
                    };
                    $scope.categories = [];
                    Category.query(function(categories) {
                        $scope.categories = categories;
                    });
                    $scope.save = function () {
                        var $category = new Category($scope.category);
                        $category.$save(function (res) {
                            tableParams.reload();
                            $uibModalInstance.dismiss('close');
                            Notification.success('{{__('Saved successfully')}}');
                        }, function (xhr) {
                            if (xhr.status == 422) {
                                var validatorError = [];
                                for (key in xhr.data) {
                                    validatorError.push(key + ': ' + (typeof xhr.data[key] =='string'?xhr.data[key]:xhr.data[key][0]));
                                }
                                Notification.error(validatorError.join('<br>'));
                            }
                        });
                    };
                    $scope.close = function () {
                        $uibModalInstance.dismiss('close');
                    };
                },
                backdrop: 'static',
                windowClass: 'modal-full'
            });
        };

        $scope.edit = function (row) {
            Category.get({id: row.id}, function(data) {
                $uibModal.open({
                    animation: true,
                    templateUrl: 'news/category/edit.html',
                    controller: function ($scope, $uibModalInstance) {
                        $scope.category = data;
                        $scope.name = angular.copy(data.name);
                        $scope.categories = [];
                        Category.query(function(categories) {
                            $scope.categories = categories;
                        });
                        $scope.save = function () {
                            var $category = angular.copy($scope.category);
                            $category.$update(function (res) {
                                row.name = angular.copy($scope.category.name);
                                row.description = angular.copy($scope.category.description);
                                row.status = angular.copy($scope.category.status);
                                $uibModalInstance.dismiss('close');
                                Notification.success('{{__('Saved successfully')}}');
                            }, function (xhr) {
                                if (xhr.status == 422) {
                                    var validatorError = [];
                                    for (key in xhr.data) {
                                        validatorError.push(key + ': ' + (typeof xhr.data[key] =='string'?xhr.data[key]:xhr.data[key][0]));
                                    }
                                    Notification.error(validatorError.join('<br>'));
                                }
                            });
                        };
                        $scope.close = function () {
                            $uibModalInstance.dismiss('close');
                        };
                    },
                    backdrop: 'static',
                    windowClass: 'modal-full'
                });
            });

        };

        $scope.delete = function (row) {
            Dialog.confirm(__('Are you sure you want to delete <b>:name</b>?', {name: row.name}))
                .result.then(function () {
                row.$delete(function (res) {
                    if (res == false) {
                        Notification.error('{{__('Delete failed')}}');
                    } else {
                        tableParams.reload();
                        Notification.success('{{__('Delete successfully')}}');
                    }
                });
            });
        };
    });
</script>
@endpush
@navbarcpanel([
    'icon' => 'fa fa-newspaper-o fa-fw',
    'label' => 'News',
    'permission' => ['news', 'news_cat'],
    'sub' => [
        [
            'url' => 'news',
            'name' => 'root.news',
            'label' => 'All news',
            'permission' => 'news',
            'template' => 'news.html'
        ],
        [
            'url' => '/category',
            'name' => 'root.news.category',
            'label' => 'Category',
            'permission' => 'news_cat',
            'template' => 'news/category.html'
        ]
    ]
])
