<template>
    <blog-layout>
      

            <article class="flex flex-col shadow my-4">
                <!-- Article Image -->
                <a href="#" class="hover:opacity-75">
                    <img src="https://source.unsplash.com/collection/1346951/1000x500?sig=1">
                </a>
                <div class="bg-white flex flex-col justify-start p-6">
                    <div class="text-blue-700 text-sm font-bold uppercase ">
                    <template v-for="(category,index) in post.categories">
                      <template v-if="index > 0"> |</template>
                        <inertia-link :href="`/category/${category.slug}`" :key="category.slug" >{{category.name}}</inertia-link>
                    </template>
                   </div>
                    <div class="text-3xl font-bold hover:text-gray-700 pb-4">{{ post.title }}</div>
                    <p href="#" class="text-sm pb-8">
                        By <inertia-link :href="`/user/${post.user.id}`" class="font-semibold hover:text-gray-800">{{post.user.name}}</inertia-link>, Published on {{ post.published_at}}
                    </p>
                   <div class="body">
                    {{post.body}}
                   </div>
                   
                    <div class="text-blue-700 pt-4">
                        <template v-for="(tag,index) in post.tags">
                      <template v-if="index > 0"> | </template>
                        <inertia-link :href="`/tag/${tag.slug}`" :key="tag.slug" >{{tag.name}}</inertia-link>
                    </template>
                    </div>
                </div>
            </article>

            <div class="w-full flex pt-6">
                <inertia-link 
                v-if="prevPost"
                :href="`/${prevPost.slug}`" class="w-1/2 bg-white shadow hover:shadow-md text-left p-6">
                    <p class="text-lg text-blue-800 font-bold flex items-center"><i class="fas fa-arrow-left pr-1"></i> Previous</p>
                    <p class="pt-2">{{prevPost.title}}</p>
                </inertia-link>
                <inertia-link  v-if="nextPost" :href="`/${nextPost.slug}`" class="w-1/2 bg-white shadow hover:shadow-md text-right p-6">
                    <p class="text-lg text-blue-800 font-bold flex items-center justify-end">Next <i class="fas fa-arrow-right pl-1"></i></p>
                    <p class="pt-2">{{nextPost.title}}</p>
                </inertia-link>
            </div>

            <div class="w-full flex flex-col text-center md:text-left md:flex-row shadow bg-white mt-10 mb-10 p-6">
                <div class="w-full md:w-1/5 flex justify-center md:justify-start pb-4">
                    <img src="https://source.unsplash.com/collection/1346951/150x150?sig=1" class="rounded-full shadow h-32 w-32">
                </div>
                <div class="flex-1 flex flex-col justify-center md:justify-start">
                    <p class="font-semibold text-2xl">{{post.user.name }}</p>
                    <p class="pt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel neque non libero suscipit suscipit eu eu urna.</p>
                    <div class="flex items-center justify-center md:justify-start text-2xl no-underline text-blue-800 pt-4">
                        <a class="" href="#">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a class="pl-4" href="#">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="pl-4" href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="pl-4" href="#">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>

    </blog-layout>
</template>

<script>
    import BlogLayout from '@/Layouts/BlogLayout'
    
    export default {
        props:['post','nextPost','prevPost'],
        components: {
            BlogLayout,
        },
    }
</script>
