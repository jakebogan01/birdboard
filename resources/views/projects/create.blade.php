
<form class="container" action="/projects" method="POST" style="padding-top: 40px;">
    @csrf

    <h1 class="heading is-1">Create a project</h1>

    <div class="field">
        <label class="label" for="title">Title</label>
        <div class="control">
            <input type="text" class="input" name="title" placeholder="Title">
        </div>
    </div>

    <div class="field">
        <label class="label" for="description">Description</label>
        <div class="control">
            <input type="text" class="input" name="description" placeholder="Description">
        </div>
    </div>

    <div class="field">
        <label class="label" for="title">Title</label>
        <div class="control">
            <button type="submit" class="button is-link">Create Button</button>
        </div>
    </div>
</form>
