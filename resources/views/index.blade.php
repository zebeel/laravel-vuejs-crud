<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <title>Laravel x Vuejs : CRUD</title>
</head>
<body>
    <div id="app">
        <div class="flex-center">
            <div class="form-area">
                <h3 class="text-center">My Notes</h3>
                <div class="alert alert-danger" v-bind:class="{hidden : isValidated}">
                    <span>Content is required!</span>
                </div>
                <div class="form-group">
                    <input type="text" name="content" id="content" class="form-control" v-model="NoteModel.content">
                    <input type="hidden" name="id" v-model="NoteModel.id">
                </div>
                <button class="form-group btn btn-primary" @click="upsertNote()">Add note</button>
            </div>
            <div class="note-area">
                <div class="row">
                    <div class="col-4 mt-2" v-for="note in notes">
                        <div class="card">
                            <div class="card-body">
                                <p>@{{ note.content }}</p>
                                <button class="btn btn-sm btn-primary" @click="fillNote(note)">Edit</button>
                                <button class="btn btn-sm btn-danger ml-2" @click="deleteNote(note)">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="/js/app.js"></script>
</body>
</html>
