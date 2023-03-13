<div>
    <!--<label></label>-->
    <!--<input type="file" input name="profile_image" v-model="photos" />-->
    　<enctype="multipart/form-data">
  @csrf
  <input type="file" name="profile_image">
  <button>アップロード</button>
  <button type="submit">
</form>
</div>