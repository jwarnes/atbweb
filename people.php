<script src="js/personViewmodel.js"></script>
<div class="top content">
    <div class="ui page grid">
        <div class="row">
            <div class="column">
                <h1 class="ui dividing header"><i class="icon user"></i>People</h1>
                <div class="ui two column stackable grid middle aligned">
                    <div class="column">Manage the humans known to the organization, inside or out.</div>
                    <div class="column float right">
                        <button class="ui button center inline"
                        data-bind="click: AddPersonStartModal, enable: authenticated(), css {disabled: !authenticated()}">
                        Add new contact
                    </button>
                </div>
            </div>

            <div class="ui message italic">
                You can find meanness in the least of creatures, but when God made man the devil was at his elbow. A creature that can do anything. Make a machine. And a machine to make the machine. And evil that can run itself a thousand years, no need to tend it.
            </div>
        </div>
    </div>
</div>
</div>
<?php include 'browse-people.php' ?>
<?php include 'add-person-form.php' ?>

<script>
    function AddPersonStartModal()
    {
        ClearModal();
        $("#add-person-modal")
        .modal("setting", {onVisible: FocusInput("#add-nickname") })
        .modal("show");
    }
    $('.search.button').click(function(){
        $('.people.sidebar').sidebar('toggle');
    });
</script>