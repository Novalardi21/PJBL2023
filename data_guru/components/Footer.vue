<template>
  <div class="footer">
    <footer :style="{ backgroundColor: backgroundColor }">
      <p>&copy; 2023 DMS RPL . By Kelompok 2</p>
    </footer>
  </div>
</template>

<script>
export default {
  props: {
    backgroundColor: {
      type: String,
      default: "transparent",
    },
  },
};
</script>

<style scoped>
footer p {
  /* Gaya CSS untuk footer */
  text-align: center;
  background-color: #539165;
  color: white;
}
</style>
