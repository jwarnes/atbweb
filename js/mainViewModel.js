function MainViewModel(){
    var self = this;
    self.authenticated = ko.observable(false);
    self.userInfo = ko.observable({});
    self.permissions = ko.observable({});
    

    self.email = ko.computed(function(){
        return self.userInfo().email || "";
    }, self);
}