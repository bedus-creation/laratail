<template>
    <editor
        name="description"
        imageUploadUrl="/admin/upload/image"
        @ImageUploadSuccess="ImageUploadSuccess"
    ></editor>
</template>
<script>
import Editor from "simplemde-vue";
export default {
    components: { Editor },
    methods: {
        ImageUploadSuccess: function(simplemde, response) {
            simplemde.codemirror.replaceSelection(
                "![Image Text](" + response.data.link + ")"
            );
        }
    }
};
</script>