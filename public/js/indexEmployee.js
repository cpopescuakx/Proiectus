function filterText() {
    FooTable.MyFiltering = FooTable.Filtering.extend({
        construct: function(instance) {
            this._super(instance);
            this.statuses = ['Active', 'Disabled', 'Suspended'];
            this.def = 'Any Status';
            this.$status = null;
        },
        $create: function() {
            this._super();
            var self = this,
                $form_grp = $('<div/>', { 'class': 'form-group' })
                .append($('<label/>', { 'class': 'sr-only', text: 'Status' }))
                .prependTo(self.$form);

            self.$status = $('<select/>', { 'class': 'form-control' })
                .on('change', { self: self }, self._onStatusDropdownChanged)
                .append($('<option/>', { text: self.def }))
                .appendTo($form_grp);

            $.each(self.statuses, function(i, status) {
                self.$status.append($('<option/>').text(status));
            });
        },
        _onStatusDropdownChanged: function(e) {
            var self = e.data.self,
                selected = $(this).val();
            if (selected !== self.def) {
                self.addFilter('status', selected, ['status']);
            } else {
                self.removeFilter('status');
            }
            self.filter();
        },
        draw: function() {
            this._super();
            var status = this.find('status');
            if (status instanceof FooTable.Filter) {
                this.$status.val(status.query.val());
            } else {
                this.$status.val(this.def);
            }
        }
    });
}