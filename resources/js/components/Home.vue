<template>
    <div>
        <h1>Welcome Human {{ hello }}</h1>
    </div>
</template>
<script>
export default {
    name: "Home",
    data() {
        return {
            hello: "hello",
        };
    },
};
</script>
