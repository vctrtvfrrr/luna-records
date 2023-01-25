export default defineEventHandler((event) => {
    event.node.res.statusCode = 204;
    event.node.res.end();
});
