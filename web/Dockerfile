FROM node:18-alpine
RUN mkdir /app && chown node:node /app
WORKDIR /app
COPY --chown=node:node package*.json .npmrc ./
RUN npm ci
COPY --chown=node:node . .
EXPOSE 8000
WORKDIR /app
USER node
ENV PORT 8000
CMD ["npm", "run", "dev"]
