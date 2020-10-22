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
                    <input type="text" name="content" id="content" class="form-control" v-model="NoteModel.content" v-on:keyup.enter="upsertNote()">
                    <input type="hidden" name="id" v-model="NoteModel.id">
                </div>
                <button class="form-group btn btn-primary" @click="upsertNote()">Add note</button>
            </div>
            <div class="note-area">
                <div class="row border-bottom mt-3" v-for="note in notes">
                    <div class="col-10">
                        <p>@{{ note.content }}</p>
                    </div>
                    <div class="col-2">
                        <i class="fa fa-remove float-right ml-3" style="color: #c51f1a; cursor: pointer;" @click="deleteNote(note)"></i>
                        <i class="fa fa-pencil float-right" style="cursor: pointer; color: #1d68a7" @click="fillNote(note)"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="/js/app.js"></script>
</body>
</html>
