<template>
  <div>
    <input
      type="file"
      :name="getName()"
      class="hidden"
      multiple
      ref="files"
      v-on:change="handleFilesUpload()"
    />
    <div
      class="border-4 border-dashed border-gray-500 w-full bg-white h-20 px-6 flex items-center justify-center rounded-lg"
      @click="chooseFile"
    >
      <p>Click Here to Upload</p>
    </div>
    <div v-for="file in files" :key="file.id">
      <div class="flex items-center bg-gray-100 pl-2 pr-4 py-2 rounded-lg my-1">
        <img :src="file.src" class="border-2 border-white rounded-lg w-12 h-10 shadow" />
        <div class="flex-1 px-3">
          <span class="text-gray-800">{{file.name}}</span>
        </div>
        <div class="cursor-pointer" @click="remove(file.id)">&times;</div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    name: { type: String, required: true },
    src: {},
    maxnumber: { type: Number, default: 1 }
  },
  data() {
    return {
      maxNumber: this.maxnumber,
      id: 0,
      files: []
    };
  },
  computed: {
    getFiles() {
      let list = new DataTransfer();
      _.each(this.files, function(item) {
        list.items.add(item.file);
      });
      return list.files;
    }
  },
  methods: {
    getName: function() {
      if (this.maxNumber <= 1) {
        return this.name;
      }
      return this.name + "[]";
    },
    validateMaxNumber: function(length) {
      if (this.maxNumber >= length + this.files.length) {
        return true;
      }
      let message = "No more than " + this.maxNumber + " File is allowed";
      window.flash().error(message);
      throw new Error(message);
    },
    chooseFile: function(event) {
      this.$refs.files.click();
    },
    handleFilesUpload() {
      let vm = this;
      let files = this.$refs.files.files;
      this.validateMaxNumber(files.length);
      for (var i = 0; i < files.length; i++) {
        vm.files.push({
          id: vm.id + 1,
          file: files.item(i),
          src: this.readUrl(files.item(i), vm.id + 1),
          name: files.item(i).name
        });
        vm.id = vm.id + 1;
      }
      this.$refs.files.files = this.getFiles;
    },
    remove: function(id) {
      const index = this.files.findIndex(f => f.id == id);
      this.files.splice(index, 1);
    },

    readUrl: function(file, id) {
      let vm = this;
      var reader = new FileReader();
      reader.onload = function(e) {
        const index = vm.files.findIndex(f => f.id == id);
        vm.files[index].src = e.target.result;
      };
      reader.readAsDataURL(file);
    }
  }
};
</script>
